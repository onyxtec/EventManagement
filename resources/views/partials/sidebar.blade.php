<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			@if(Auth::guard('admin')->check())
			@if(Auth::guard('admin')->user()->role('admin')	)
			<span class="text">Admin Panel</span>
			@endif
			@endif
			@if(Auth::guard('owner')->check())
			@if(Auth::guard('owner')->user()->role('owner')	)
			<span class="text">Hall Owner Panel</span>
			@endif
			@endif
		</a>
		<ul class="side-menu top">
			<li class="{{Route::is('dashboard') ? 'active' : ''}}">
				<a href="{{route('dashboard')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class ="{{Route::is('halls.index') || Route::is('halls.create') ? 'active' : ''}}">
				<a href="{{route('halls.index')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Halls</span>
				</a>
			</li>
			@if(Auth::guard('owner')->check())
			@if(Auth::guard('owner')->user()->role('owner')	)
					<li class="{{Route::is('themes.index') || Route::is('themes.create') ? 'active' : ''}}">
				<a href="{{route('themes.index')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Themes</span>
				</a>
			</li>
			@endif
	@endif
	<li class="{{Route::is('bookings.index')  ? 'active' : ''}}">
		<a href="{{route('bookings.index')}}">
			<i class='bx bxs-clinic'></i>
			<span class="text">Bookings</span>
		</a>
	</li>
	<li class="{{Route::is('time.index')  ? 'active' : ''}}">
		<a href="{{route('time.index')}}">
			<i class='bx bxs-time'></i>
			<span class="text">TimeSlots</span>
		</a>
	</li>
		</ul>
		
		<ul class="side-menu">
			<li>
				<a href="{{route('user.logout')}}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->