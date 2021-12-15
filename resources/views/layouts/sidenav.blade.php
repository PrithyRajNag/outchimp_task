<div class="admin-nav p-0">
    <h4 class="text-light text-center p-2">Side Panel</h4>
    <div class="list-group list-group-flush nav-side-menu">
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <a href={{route('dashboard.index')}}>
                    <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><i class="fas fa-tachometer-alt" style="width: 20px"></i> Dashboard
                    </li>
                </a>
                <a href={{route('category.index')}}>
                    <li class="{{ Request::is('category') ? 'active' : '' }}"><i class="fab fa-delicious" style="width: 20px"></i> Categories
                    </li>
                </a>
                <a href={{route('unit.index')}}>
                    <li class="{{ Request::is('unit') ? 'active' : '' }}"><i class="fab fa-unity"></i> Units
                    </li>
                </a>
                <a href={{route('product.index')}}>
                    <li class="{{ Request::is('product') ? 'active' : '' }}"><i class="fab fa-product-hunt"></i> Products
                    </li>
                </a>
            </ul>
        </div>
    </div>
</div>
