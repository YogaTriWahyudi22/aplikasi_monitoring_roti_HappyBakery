 <footer class="main-footer">
   <div class="float-right d-none d-sm-block">
     <b>Version</b> 3.0.5
   </div>
   <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">Happy Bakery</a>.</strong> All rights
   reserved.
 </footer>

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
   <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->
 </div>
 <!-- ./wrapper -->

 <!-- jQuery -->
 <script src="../asset/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- DataTables -->
 <script src="../asset/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="../asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
 <script src="../asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
 <!-- AdminLTE App -->
 <script src="../asset/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="../asset/dist/js/demo.js"></script>

 <script>
   $(function() {
     $("#example1").DataTable({
       "responsive": true,
       "autoWidth": false,
     });
     $('#example2').DataTable({
       "paging": true,
       "lengthChange": false,
       "searching": false,
       "ordering": true,
       "info": true,
       "autoWidth": false,
       "responsive": true,
     });
   });
 </script>
 </body>

 </html>