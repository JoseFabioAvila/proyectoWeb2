@extends('layouts.app')

@section('navbar')

<div class="page_content_wrap page_paddings_yes">
	<div class="content_wrap">
		<div class="content">
			<div class="post_item post_item_404">
				<div class="post_content">
					<h1 class="page_title">404</h1>
					<h2 class="page_subtitle">The requested page cannot be found</h2>
					<p class="page_description">Can't find what you need? Take a moment and do a search below or 	start from <a href="index.html">our homepage</a>.
					</p>
					<div class="page_search">
						<div class="search_wrap search_style_regular search_state_fixed search_ajax inited">
							<div class="search_form_wrap">
								<form method="get" class="search_form" action="#">
									<input type="text" class="search_field" placeholder="To search type and hit enter" value="" name="s">
									<button type="submit" class="search_submit icon-search search title=" start="" search"="">
										<span>Search</span>
									</button>
								</form>
							</div>
							<div class="search_results widget_area scheme_original">
								<a class="search_results_close icon-cancel"></a>
								<div class="search_results_content"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
