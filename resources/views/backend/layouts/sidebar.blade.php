<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    @canany(['our_invitations','read_invitations'])
    <hr class="sidebar-divider">
     <!-- Heading -->
     <div class="sidebar-heading">
        {{__('invitation.invitations')}}
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    {{-- Invitation --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invitationCollapse" aria-expanded="true" aria-controls="invitationCollapse">
          <i class="fas fa-table"></i>
          <span>{{__('invitation.invitations')}}</span>
        </a>
        <div id="invitationCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">{{__('invitation.invitation_options')}}:</h6>
            @can("read_invitations")
                <a class="collapse-item" href="{{route('invitations.read')}}">{{__('invitation.all_invitations')}}</a>
            @endcan
            @can("our_invitations")
                <a class="collapse-item" href="{{route('invitations.read.our')}}">{{__('invitation.our_invitations')}}</a>
            @endcan
            @can("create_invitations")
                <a class="collapse-item" href="{{route('invitations.create')}}">{{__('invitation.add_invitation')}}</a>
            @endcan

          </div>
        </div>
    </li>
    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('read_banners')
    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>
    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-image"></i>
        <span>Banners</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Banner Options:</h6>
          <a class="collapse-item" href="{{route('banner.index')}}">Banners</a>
          @can('create_banners')
            <a class="collapse-item" href="{{route('banner.create')}}">Add Banners</a>
          @endcan
        </div>
      </div>
    </li>
    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Shop
        </div>
    @can('read_categories')
    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('category.index')}}">Category</a>
            @can('create_categories')
            <a class="collapse-item" href="{{route('category.create')}}">Add Category</a>
            @endcan
          </div>
        </div>
    </li>
    @endcan

    @can('read_products')
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse" aria-expanded="true" aria-controls="productCollapse">
          <i class="fas fa-cubes"></i>
          <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Product Options:</h6>
            <a class="collapse-item" href="{{route('product.index')}}">Products</a>
            @can('create_products')
                <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
            @endcan
          </div>
        </div>
    </li>
    @endcan
    @can('read_brands')
    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true" aria-controls="brandCollapse">
          <i class="fas fa-table"></i>
          <span>Brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Brand Options:</h6>
            <a class="collapse-item" href="{{route('brand.index')}}">Brands</a>
            @can("create_brands")
                <a class="collapse-item" href="{{route('brand.create')}}">Add Brand</a>
            @endcan

          </div>
        </div>
    </li>
    @endcan
@can("read_shippings")
     {{-- Shipping --}}
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse" aria-expanded="true" aria-controls="shippingCollapse">
          <i class="fas fa-truck"></i>
          <span>Shipping</span>
        </a>
        <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Shipping Options:</h6>
            <a class="collapse-item" href="{{route('shipping.index')}}">Shipping</a>
            @can("create_shippings")
                <a class="collapse-item" href="{{route('shipping.create')}}">Add Shipping</a>
            @endcan
          </div>
        </div>
    </li>
@endcan

@can("read_orders")
     <!--Orders -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Orders</span>
        </a>
    </li>
@endcan

    @can("read_reviews")
    <!-- Reviews -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('review.index')}}">
            <i class="fas fa-comments"></i>
            <span>Reviews</span></a>
    </li>
    @endcan



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Posts
    </div>
@can("read_posts")

    <!-- Posts -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
        <i class="fas fa-fw fa-folder"></i>
        <span>Posts</span>
      </a>
      <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Post Options:</h6>
          <a class="collapse-item" href="{{route('post.index')}}">Posts</a>
          @can("create_posts")
            <a class="collapse-item" href="{{route('post.create')}}">Add Post</a>
          @endcan
        </div>
      </div>
    </li>

@endcan
@can('read_post_categories')
     <!-- Category -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
          <i class="fas fa-sitemap fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('post-category.index')}}">Category</a>
            @can("create_post_categories")
                 <a class="collapse-item" href="{{route('post-category.create')}}">Add Category</a>
            @endcan

          </div>
        </div>
      </li>
      @endcan
      @can('read_tags')
      <!-- Tags -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>Tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tag Options:</h6>
            <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>
            @can("create_tags")
                <a class="collapse-item" href="{{route('post-tag.create')}}">Add Tag</a>
            @endcan

            </div>
        </div>
    </li>
    @endcan
    @can('read_comments')
      <!-- Comments -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
      </li>
    @endcan

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
     <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>
    @can('read_coupons')
    <li class="nav-item">
      <a class="nav-link" href="{{route('coupon.index')}}">
          <i class="fas fa-table"></i>
          <span>Coupon</span></a>
    </li>
    @endcan
    @can('read_admins')
    <!-- Admins -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admins.index')}}">
            <i class="fas fa-users"></i>
            <span>Admins</span></a>
    </li>
    @endcan
    @can('read_users')
     <!-- Users -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
    @endcan
    @can('read_roles')
      <!-- Roles -->
      <li class="nav-item">
        <a class="nav-link" href="{{route('roles.index')}}">
            <i class="fas fa-users"></i>
            <span>Roles</span></a>
    </li>
    @endcan
    @can('read_settings')
     <!-- General settings -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>
    @endcan

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
