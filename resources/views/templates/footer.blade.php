<!-- footer content -->
<footer class="main-footer">
	<div class="pull-right hidden-xs">
		Made with <i class="fa fa-heart fa-lg" style="color: #d90429;"></i> by 
		<strong>
			<a href="http://www.achieveee.com" target="_blank" style="color: #676a6c;">Achieveee</a>
		</strong>
	</div>
	<strong>Happy to Reco</strong> - {{ date('Y') }}
</footer>
<!-- /footer content -->
<!-- back to top -->
<a href="#" class="back-to-top">
	<i class="fa fa-chevron-up"></i>
</a>
<!-- /back to top -->
@include('templates.msgbox')
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
@if (Session::has('msg'))
	<script type="text/javascript">
		msgbox("{{ Session::get('msg') }}");
	</script>
@endif