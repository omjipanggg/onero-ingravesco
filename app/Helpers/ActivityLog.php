<?php

namespace App\Helpers;

use Request;

use App\Models\UserActivityLog as Log;

class ActivityLog {
	public static function logging($subject) {
		$log = [];
		$log['subject'] = $subject;
		$log['url'] = Request::fullUrl();
		$log['ip_address'] = Request::ip();
		$log['method'] = Request::method();
		$log['user_agent'] = Request::header('user-agent');
		$log['user_id'] = auth()->check() ? auth()->user()->id : null;
		Log::create($log);
	}

	public static function latestLog() {
		$data = [];
		if (auth()->check()) {
			$data = Log::where(['user_id' => auth()->user()->id])
			->limit(1)
			->offset(1)
			->orderByDesc('created_at')
			->first();
		}
		return $data;
	}
}