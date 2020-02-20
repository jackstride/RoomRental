<?php
// if $user variable is defined in other files, include the below, removes errors otherwise caused
if(isset($user)) {
$add = $user->hasPermission(\Furniture\Entities\Admin::ADD);
$edit = $user->hasPermission(\Furniture\Entities\Admin::EDIT);
$delete = $user->hasPermission(\Furniture\Entities\Admin::DELETE);
$hide = $user->hasPermission(\Furniture\Entities\Admin::HIDE);
}
?>


<nav class="admin_nav">
<ul>
<li><a href='/admin/landlords'>Landlords</a></li>
<li><a href='/admin/houses'>Houses</a></li>
<li><a href='/admin/rooms'>Rooms</a></li>
<li><a href='/admin/tenants'>Tenants</a></li>
<li><a href='/admin/rentals'>Rentals</a></li>

 </ul>
 </nav>

<!-- <h3> Staff </h3>
<ul>
    <li><a href='/admin/addemployee'> Add a new user </a></li>
    <li><a href='/admin/list'>View and Edit Users</a></li>
    
</ul> -->
