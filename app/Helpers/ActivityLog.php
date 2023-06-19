<?php

namespace App\Helpers;

use Request;

use App\Models\UserActivityLog;

class ActivityLog {
	public static function logging($subject) {
		$log = [];
		$log['subject'] = $subject;
		$log['url'] = Request::fullUrl();
		$log['ip_address'] = Request::ip();
		$log['method'] = Request::method();
		$log['user_agent'] = Request::header('user-agent');
		$log['user_id'] = auth()->check() ? auth()->user()->id : null;
		UserActivityLog::create($log);
	}

	public static function getActivityLog() {
		$data = [];
		if (auth()->check()) {
			$data = UserActivityLog::where([
				['user_id', auth()->id()],
				['subject', 'Login']
			])->orderByDesc('created_at')
			->limit(1)
			->offset(1)
			->first();
			if (!$data) {
				$data = UserActivityLog::where('user_id', auth()->id())
				->orderByDesc('created_at')->first();
			}
		}
		return $data;
	}
}