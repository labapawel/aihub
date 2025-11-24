<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AiController extends Controller
{
    public function airun($model, $key, Request $request)
    {
        $keyRecord = \App\Models\Key::where('key', $key)->first();
        if (!$keyRecord) {
            abort(401, 'Invalid API Key');
        }

        $group = \App\Models\Group::where('name', $model)->first();
        if (!$group) {
            abort(401, 'Group not found');
        }

        $models = $group->aiModels()->inRandomOrder()->get();
        if ($models->isEmpty()) {
            abort(401, 'No models available in the group');
        }

        $selectedModel = null;
        foreach ($models as $mod) {
            if (!$mod->hasReachedMinuteLimit() && !$mod->hasReachedDailyLimit()) {
                $selectedModel = $mod;
                break;
            }
        }

        if (!$selectedModel) {
            abort(401, 'All models in the group have reached their limits');
        }

        $res = $selectedModel;
        $prompt = $request->get('prompt', '');
        // dd($prompt);
        $log = \App\Models\Aimodelrun::create(['aimodel_id'=>$res->id, 'input_data'=>$prompt, 'status'=>'running']);
        $log->save();
        $output = '';
        try{
        
                eval($res->script);
                $output = substr($output, 1, strlen($output)-2);
                $log->output_data = $output;

        } catch (\Exception $e) {
            $log->status = 'failed';
            $output = 'Error: '.$e->getMessage();
            $log->output_data = $e->getMessage();
            $log->save();
            abort(500, 'Error executing model script: '.$e->getMessage());
        }
        $log->status = 'completed';
        $log->save();
        \Log::info($output);
        return response()->json(['response' => $output, 'res'=>$jsonBody??'']);
    }
}
