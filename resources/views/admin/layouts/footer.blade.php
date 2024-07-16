<aside class="control-sidebar control-sidebar-dark">

</aside>
@php
  $getSettingFooter = App\Models\SystemSettingModel::getSingle();
@endphp
<footer class="main-footer">
  <strong>Copyright &copy; {{ date('Y') }} </strong> All rights reserved.
</footer>
