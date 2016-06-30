Click here to reset your password: <a href="{{ $link = url('tease.me/password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
