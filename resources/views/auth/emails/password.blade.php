Click here to reset your password: <a href="{{ $link = url(Request::segment(1) . '/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
