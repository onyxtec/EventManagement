@include('userDashboard.styles.style')
@include('userDashboard.partials.sidebar')

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			@include('userDashboard.partials.head')
			@yield('content')
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
@include('scripts.script')