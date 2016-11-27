@extends('layouts.app')

@section('navbar')

<div class="page_content_wrap page_paddings_yes">
	<div class="content_wrap">
		<div class="content">
			<div class="post_item post_item_404">
				<div class="post_content">
					<h1 class="page_title">404</h1>
					<h2 class="page_subtitle">The requested page cannot be found</h2>
					<p class="page_description"> Rediret to <a href="{{ url('home')}}">our homepage</a>.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
