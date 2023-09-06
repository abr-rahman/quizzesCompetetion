  <!-- /.content-wrapper -->
  <footer class="main-footer d-flex justify-content-between px-3">
      <div class="float-right d-none d-sm-inline-block">
          <b>v</b> 0.2.0
      </div>
      <div>
          Copyright &copy; 2022 - {{ date('Y') }}
          All Rights Reserved.
      </div>
          <div>
            <a href="#" onclick="document.getElementById('logoutForm').submit();">
                <i class="fas fa-power-off" style="color: red;"></i> <!-- Red power icon -->
                &nbsp;<strong>Logout</strong>
            </a>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
  </footer>
