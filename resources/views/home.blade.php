<!DOCTYPE html>
<html lang="en">

<x-user.layouts.head></x-user.layouts.head>

<body>

<!-- ======= Top Bar ======= -->
<x-user.section.topbar></x-user.section.topbar>

<!-- ======= Header ======= -->
<x-user.layouts.header :categories="$categories"></x-user.layouts.header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<x-user.section.hero></x-user.section.hero>
<!-- End Hero -->

<!-- ======= Main ======= -->
<x-user.layouts.main :posts="$posts"></x-user.layouts.main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<x-user.layouts.footer></x-user.layouts.footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<x-user.layouts.js></x-user.layouts.js>

</body>

</html>
