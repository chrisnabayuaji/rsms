      <!-- Main Footer -->
      <footer class="main-footer <?php if($profile['footer_small_text'] == 1 ){echo 'text-sm';}?>">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
          Page rendered in {elapsed_time} seconds.
        </div>
        <!-- Default to the left -->
        Copyright &copy; <?php if(date('Y') <= $profile['start_year']){echo $profile['start_year'];}else{$profile['start_year'].'-'.date('Y');}?> 
        <b><a href="" class="text-black"><?=$profile['company_name']?></a></b>
        All rights reserved.
      </footer>
    </div>
    <!-- ./wrapper -->  
  </body>
</html>