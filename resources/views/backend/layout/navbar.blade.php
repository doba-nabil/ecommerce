<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        @if (Session::has('ads'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#ads">
                    <div class="pull-left">
                        <i class="zmdi zmdi-edit"></i>
                        <span class="right-nav-text">المنتجات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="ads" class="collapse collapse-level-1">
                    <li><a href="{{ route('products.index') }}">كل المنتجات</a></li>
                    <li><a href="{{ route('products.create') }}">اضافة منتج جديد</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('comments.index') }}" data-toggle="collapse"
                   data-target="{{ route('comments.index') }}">
                    <div class="pull-left">
                        <i class="zmdi zmdi-comment-text-alt"></i>
                        <span class="right-nav-text">التعليقات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-left"></i></div>
                    <div class="clearfix"></div>
                </a>
            </li>
        @endif
        @if (Session::has('categories'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories">
                    <div class="pull-left">
                        <i class="zmdi zmdi-folder"></i>
                        <span class="right-nav-text">التصنيفات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="categories" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('categories.index') }}">كل التصنيفات</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.create') }}">اضافة تصنيف جديد</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#subcategories">
                    <div class="pull-left">
                        <i class="zmdi zmdi-folder-star"></i>
                        <span class="right-nav-text">التصنيفات الفرعية</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="subcategories" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('subcategories.index') }}">كل التصنيفات الفرعية</a>
                    </li>
                    <li>
                        <a href="{{ route('subcategories.create') }}">اضافة تصنيف فرعي جديد</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#subsubcategories2">
                    <div class="pull-left">
                        <i class="zmdi zmdi-folder-star-alt"></i>
                        <span class="right-nav-text">التصنيفات الفرعية الثانية</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="subsubcategories2" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('subsubcategories.index') }}"> كل التصنيفات الفرعية الثانية</a>
                    </li>
                    <li>
                        <a href="{{ route('subsubcategories.create') }}">اضافة تصنيف فرعي ثاني جديد</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#brands">
                    <div class="pull-left">
                        <i class="zmdi zmdi-star-circle"></i>
                        <span class="right-nav-text">الماركات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="brands" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('brands.index') }}">كل الماركات</a>
                    </li>
                    <li>
                        <a href="{{ route('brands.create') }}">اضافة ماركة جديدة</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#sliders">
                    <div class="pull-left">
                        <i class="zmdi zmdi-collection-folder-image"></i>
                        <span class="right-nav-text">السلايدر</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="sliders" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('mainslider.index') }}">الكل</a>
                    </li>
                    <li>
                        <a href="{{ route('mainslider.create') }}">اضافة سلايدر جديد</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#measures">
                    <div class="pull-left">
                        <i class="zmdi zmdi-ruler"></i>
                        <span class="right-nav-text">وحدات القياس</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="measures" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('measures.index') }}">كل الوحدات</a>
                    </li>
                    <li>
                        <a href="{{ route('measures.create') }}">اضافة وحدة جديدة</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Session::has('countries'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#countries">
                    <div class="pull-left">
                        <i class="zmdi zmdi-globe"></i>
                        <span class="right-nav-text">الدول</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="countries" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('countries.index') }}">كل الدول</a>
                    </li>
                    <li>
                        <a href="{{ route('countries.create') }}">اضافة دولة جديدة</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#cities">
                    <div class="pull-left">
                        <i class="zmdi zmdi-city-alt"></i>
                        <span class="right-nav-text">المدن</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="cities" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('cities.index') }}">كل المدن</a>
                    </li>
                    <li>
                        <a href="{{ route('cities.create') }}">اضافة مدينة جديدة</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Session::has('banks'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#banks">
                    <div class="pull-left">
                        <i class="zmdi zmdi-balance"></i>
                        <span class="right-nav-text">البنوك</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="banks" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('banks.index') }}">كل البنوك</a>
                    </li>
                    <li>
                        <a href="{{ route('banks.create') }}">اضافة بنك جديد</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#carts">
                    <div class="pull-left">
                        <i class="zmdi zmdi-shopping-cart"></i>
                        <span class="right-nav-text">طلبات الشراء</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="carts" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('newOrders') }}">طلبات جديدة</a>
                    </li>
                    <li>
                        <a href="{{ route('checkouts.index') }}">كل الطلبات</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Session::has('users'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#users">
                    <div class="pull-left">
                        <i class="zmdi zmdi-account"></i>
                        <span class="right-nav-text">الاعضاء</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="users" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('users.index') }}">كل الأعضاء</a>
                    </li>
                    <li>
                        <a href="{{ route('users.create') }}">اضافة عضو جديد</a>
                    </li>
                    <li>
                        <a href="{{ route('credit.index') }}">نماذج تحويل الرصيد</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#stores">
                    <div class="pull-left">
                        <i class="zmdi zmdi-store"></i>
                        <span class="right-nav-text">المتاجر</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="stores" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('stores.index') }}">كل المتاجر</a>
                    </li>
                    <li>
                        <a href="{{ route('inactiveStores') }}">متاجر بانتظار التفعيل</a>
                    </li>
                    <li>
                        <a href="{{ route('store_payments.index') }}">نماذج الايداع</a>
                    </li>
                    <li>
                        <a href="{{ route('reviews.index') }}">مراجعات المتاجر</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#packages">
                    <div class="pull-left">
                        <i class="zmdi zmdi-storage"></i>
                        <span class="right-nav-text">باقات الاشتراك</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="packages" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('packages.index') }}">كل الباقات</a>
                    </li>
                    <li>
                        <a href="{{ route('packages.create') }}">اضافة باقة جديدة</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Session::has('moderators'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#moderators">
                    <div class="pull-left">
                        <i class="zmdi zmdi-accounts"></i>
                        <span class="right-nav-text">المشرفين</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="moderators" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('moderators.index') }}">كل المشرفين</a>
                    </li>
                    <li>
                        <a href="{{ route('moderators.create') }}">اضافة مشرف جديد</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Session::has('currencies'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#currencies">
                    <div class="pull-left">
                        <i class="zmdi zmdi-money"></i>
                        <span class="right-nav-text">العملات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="currencies" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('currencies.index') }}">كل العملات</a>
                    </li>
                    <li>
                        <a href="{{ route('currencies.create') }}">اضافة عملة جديدة</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#ships">
                    <div class="pull-left">
                        <i class="zmdi zmdi-truck"></i>
                        <span class="right-nav-text">طرق الشحن</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="ships" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('ships.index') }}">كل طرق الشحن</a>
                    </li>
                    <li>
                        <a href="{{ route('ships.create') }}">اضافة طريقة شحن جديدة</a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Session::has('pages'))
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#pages">
                    <div class="pull-left">
                        <i class="zmdi zmdi-file"></i>
                        <span class="right-nav-text">الصفحات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="pages" class="collapse collapse-level-1">
                    <li>
                        <a href="{{ route('pages.index') }}">كل الصفحات</a>
                    </li>
                    <li>
                        <a href="{{ route('pages.create') }}">اضافة صفحة جديدة</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('banners.index') }}" data-toggle="collapse"
                   data-target="{{ route('banners.index') }}">
                    <div class="pull-left">
                        <i class="zmdi zmdi-picture-in-picture"></i>
                        <span class="right-nav-text">البنرات</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-left"></i></div>
                    <div class="clearfix"></div>
                </a>
            </li>
        @endif
        @if (Session::has('contact'))
                <li>
                    <a href="javascript:void(0);" data-toggle="collapse" data-target="#subscribers">
                        <div class="pull-left">
                            <i class="zmdi zmdi-mic-outline"></i>
                            <span class="right-nav-text">القائمة البريدية</span>
                        </div>
                        <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                        <div class="clearfix"></div>
                    </a>
                    <ul id="subscribers" class="collapse collapse-level-1">
                        <li>
                            <a href="{{ route('subscribers') }}">المشتركين</a>
                        </li>
                        <li>
                            <a href="{{ route('emailForm') }}">ارسال بريد</a>
                        </li>
                    </ul>
                </li>
            <li>
                <a href="{{ route('adminContact') }}" data-toggle="collapse"
                   data-target="{{ route('adminContact') }}">
                    <div class="pull-left">
                        <i class="zmdi zmdi-email"></i>
                        <span class="right-nav-text">رسائل الزوار</span>
                    </div>
                    <div class="pull-right"><i class="zmdi zmdi-caret-left"></i></div>
                    <div class="clearfix"></div>
                </a>
            </li>

        @endif
    </ul>
</div>