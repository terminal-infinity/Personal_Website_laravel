<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Dashboard Template</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <!-- core:css -->
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/core/core.css') }}">
  <!-- endinject -->

  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/flatpickr/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/dropzone/dropzone.css') }}">
  <!-- End plugin css for this page -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/assets/fonts/feather-font/css/iconfont.css') }}">
  <link rel="stylesheet" href="{{ asset('public/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
  <!-- endinject -->

  <!-- Theme Stylesheet - Default is lighter -->
  <link id="theme-style" rel="stylesheet" href="{{ asset('public/assets/css/demo1/style.css') }}">
  
  <link rel="shortcut icon" href="{{ asset('public/assets/images/icon.png') }}" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		@include('admin.body.sidebar')
		<!-- partial -->
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
		    @include('admin.body.header')
			
			<!-- partial -->

            @yield('admin')


            <!-- partial:partials/_footer.html -->
		    @include('admin.body.footer')
			
			<!-- partial -->
		
		</div>
	</div>
	<!-- Theme Switch Button -->
	<button class="btn btn-primary" id="theme-switcher" onclick="toggleTheme()" style="position: fixed; bottom: 20px; right: 20px; padding: 10px; color: white; border: none; border-radius: 5px;">
		Switch Theme
  	</button>
	<!-- core:js -->
	<script src="{{ asset('public/assets/vendors/core/core.js') }} "></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('public/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('public/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('public/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('public/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
    <script src="{{ asset('public/assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for this page -->
	<script src="{{ asset('public/assets/js/data-table.js') }}"></script>
	<!-- Plugin js for this page -->
	<script src="{{ asset('public/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('public/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	  <!-- End plugin js for this page -->
	  <!-- Summernote -->
	<script src="{{ asset('public/assets/vendors/summernote/summernote-bs4.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendors/dropzone/dropzone.js') }}"></script>
	
	<script>
		Dropzone.autoDiscover = false;    
		$(function () {
			// Summernote
			$('#summernote').summernote({
				height: '300px'
			});
		   
			const dropzone = $("#image").dropzone({ 
				url:  "create-product.html",
				maxFiles: 5,
				addRemoveLinks: true,
				acceptedFiles: "image/jpeg,image/png,image/gif",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				}, success: function(file, response){
					$("#image_id").val(response.id);
				}
			});
	  
		});
	  </script>
<script>
    // Check the current theme setting on page load
    document.addEventListener("DOMContentLoaded", function() {
      const currentTheme = localStorage.getItem("theme") || "lighter";
      setTheme(currentTheme);
    });

    // Toggle between lighter and darker themes
    function toggleTheme() {
      const currentTheme = localStorage.getItem("theme") === "darker" ? "lighter" : "darker";
      setTheme(currentTheme);
    }

    // Function to set the theme
    function setTheme(theme) {
      const themeLink = document.getElementById("theme-style");
      themeLink.href = theme === "darker" 
        ? "{{ asset('public/assets/css/demo2/style.css') }}" 
        : "{{ asset('public/assets/css/demo1/style.css') }}";
      
      // Store the current theme setting
      localStorage.setItem("theme", theme);
    }
  </script>

</body>
</html>    