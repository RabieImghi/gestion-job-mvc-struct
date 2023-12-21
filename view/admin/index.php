<?php
if(isset($_SESSION['roleUser'])){
    if($_SESSION['roleUser']==2) header('location: index.php?route=home');
$home="active";
ob_start();
?>
<div class='row'>
    <div class="col-xxl-3 col-md-6">
        <div class="card info-card sales-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Total of job offers</h5>

            <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-cart"></i>
            </div>
            <div class="ps-3">
                <h6><?=$statistique[0]['totalJobs']?></h6>
                <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
            </div>
        </div>

        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div class="card info-card revenue-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Total active offers. </h5>

            <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="ps-3">
                <h6><?=$statistique[1]['totalJobsActive']?></h6>
                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
            </div>
        </div>

        </div>
    </div>
    <div class="col-xxl-3 col-xl-12">
        <div class="card info-card customers-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Total inactive offers.</h5>

            <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
            </div>
            <div class="ps-3">
                <h6><?=$statistique[2]['totalJobsInActive']?></h6>
                <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

            </div>
            </div>

        </div>
        </div>
    </div>
    <div class="col-xxl-3 col-md-6">
        <div class="card info-card revenue-card">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Total approved offers.</h5>

            <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-currency-dollar"></i>
            </div>
            <div class="ps-3">
                <h6><?=$statistique[3]['Jobapprove']?></h6>
                <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
            </div>
        </div>

        </div>
    </div>
    <div class="col-12">
        <div class="card recent-sales overflow-auto">

        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
                <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Recent Sales <span>| Today</span></h5>

            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns"><div class="datatable-top">
                    <div class="datatable-dropdown">
                            <label>
                                <select class="datatable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="-1">All</option></select> entries per page
                            </label>
                        </div>
                    <div class="datatable-search">
                            <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                        </div>
                </div>
                <div class="datatable-container"><table class="table table-borderless datatable datatable-table"><thead><tr><th data-sortable="true" style="width: 10.714285714285714%;"><button class="datatable-sorter">#</button></th><th data-sortable="true" style="width: 23.46938775510204%;"><button class="datatable-sorter">Customer</button></th><th data-sortable="true" style="width: 39.285714285714285%;"><button class="datatable-sorter">Product</button></th><th data-sortable="true" style="width: 11.73469387755102%;"><button class="datatable-sorter">Price</button></th><th data-sortable="true" class="red" style="width: 14.795918367346939%;"><button class="datatable-sorter">Status</button></th></tr></thead><tbody><tr data-index="0"><td><a href="#">#2457</a></td><td>Brandon Jacob</td><td><a href="#" class="text-primary">At praesentium minu</a></td><td>$64</td><td class="green"><span class="badge bg-success">Approved</span></td></tr><tr data-index="1"><td><a href="#">#2147</a></td><td>Bridie Kessler</td><td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td><td>$47</td><td class="green"><span class="badge bg-warning">Pending</span></td></tr><tr data-index="2"><td><a href="#">#2049</a></td><td>Ashleigh Langosh</td><td><a href="#" class="text-primary">At recusandae consectetur</a></td><td>$147</td><td class="green"><span class="badge bg-success">Approved</span></td></tr><tr data-index="3"><td><a href="#">#2644</a></td><td>Angus Grady</td><td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td><td>$67</td><td class="green"><span class="badge bg-danger">Rejected</span></td></tr><tr data-index="4"><td><a href="#">#2644</a></td><td>Raheem Lehner</td><td><a href="#" class="text-primary">Sunt similique distinctio</a></td><td>$165</td><td class="green"><span class="badge bg-success">Approved</span></td></tr></tbody></table></div>
                <div class="datatable-bottom">
                    <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                    <nav class="datatable-pagination"><ul class="datatable-pagination-list"></ul></nav>
                </div></div>

        </div>

        </div>
    </div>
</div>
<?php
$content=ob_get_clean();
include 'header.php';
}else{
    header('location: index.php?route=home');
}
?>