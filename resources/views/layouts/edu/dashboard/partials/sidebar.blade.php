<div class="col-xl-3">
    <div class="afc-dashboard-sidebar">
        <!-- Responsive offcanvas body START -->
        <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar">
            <!-- Offcanvas header -->
            <!-- Offcanvas body -->
            <div class="offcanvas-body p-xl-0">
                <div class="border rounded-3 pb-0 w-100 overflow-hidden">

                    <div class="afc-dashboard-sidebar__header">
                        <div class="d-flex mb-3 justify-content-between align-items-center">
                            <div>
                                <h5>کوروش نیستانی</h5>
                                <h6>09196965764</h6>
                            </div>
                            <div>
                                <i
                                    class="bi bi-pencil fa-fw " style="color: #19bfd3; font-size: 16px"></i>
                            </div>
                        </div>

                        <div class="d-flex mb-4 justify-content-between align-items-center">
                            <div>
                                <p>کیف پول</p>
{{--                                <a href="#">فعال سازی</a>--}}
                            </div>
                            <div class="" style="font-size: 12px;">
                                <div>
                                    <span>10.000</span>
                                    <span>تومان</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p>دیجی کلاب</p>
                                <a href="#">مشاهده‌ی مأموریت‌ها</a>
                            </div>
                            <div class="" style="font-size: 12px;">
                                <div>
                                    <span>50</span>
                                    <span>امتیاز</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard menu -->
                    <div class="list-group list-group-dark list-group-borderless">
                        <a class="list-group-item {{isActiveMenu('/user/dashboard')}}" href="/user/dashboard"><i
                                class="bi bi-ui-checks-grid fa-fw me-2"></i>داشبورد</a>
                        <a class="list-group-item {{isActiveMenu('/user/courses')}}" href="/user/courses"><i
                                class="bi bi-basket fa-fw me-2"></i>دوره های من</a>
                        <a class="list-group-item {{isActiveMenu('/user/wallet')}}" href="/user/wallet"><i
                                class="bi bi-question-diamond fa-fw me-2"></i>کیف پول</a>
                        <a class="list-group-item {{isActiveMenu('/user/transactions')}}" href="/user/transactions"><i
                                class="bi bi-graph-up fa-fw me-2"></i>تراکنش ها</a>
                        <a class="list-group-item {{isActiveMenu('/user/profile')}}" href="/user/profile"><i
                                class="bi bi-people fa-fw me-2"></i>پروفایل</a>
                        <a class="list-group-item {{isActiveMenu('/user/password')}}" href="/user/password"><i
                                class="bi bi-folder-check fa-fw me-2"></i>تغییر پسورد</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Responsive offcanvas body END -->
    </div>
</div>

<style>
    .afc-dashboard-sidebar .list-group-item {
        height: 55px;
        display: flex;
        align-items: center;
        border-radius: 0;
        margin: 0;
        position: relative;
        color: #000 !important;
        background: transparent;
        padding: 0 24px !important

    }

    .afc-dashboard-sidebar .list-group-item:hover {
        background: #f0f0f1 !important;
    }

    .afc-dashboard-sidebar .list-group-item:after {
        left: 20px;
        right: 20px;
        bottom: 1px;
        content: '';
        height: 1px;
        position: absolute;
        background-color: #f0f0f1;
    }

    .afc-dashboard-sidebar .list-group-item:before {
        top: 6px;
        bottom: 6px;
        right: 0;
        width: 4px;
        content: '';
        z-index: 1;
        position: absolute;
        background-color: transparent;
    }

    .afc-dashboard-sidebar .list-group-item.active:before {
        background-color: red;
    }
</style>

<style>
    .afc-dashboard-sidebar__header {
        font-size: 14px;
        padding: 25px;
        position: relative;
    }

    .afc-dashboard-sidebar__header p {
        margin-bottom: 3px;
    }

    .afc-dashboard-sidebar__header a {
        color: #19bfd3;
        font-size: 12px;
        font-weight: 500;
    }

    .afc-dashboard-sidebar__header h5 {
        color: #000;
        font-size: 16px;
    }

    .afc-dashboard-sidebar__header h6 {
        color: inherit;
        color: #a1a3a8;
        font-size: 12px;
        font-weight: 500;
    }

    .afc-dashboard-sidebar__header:after {
        left: 20px;
        right: 20px;
        bottom: 0;
        content: '';
        height: 1px;
        position: absolute;
        background-color: #f0f0f1;
    }
</style>
