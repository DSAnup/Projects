<?php $this->load->view('header');?>
<?php $userID = $this->session->userdata('userID');;?>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <?php $this->load->view('topbar');?>
    <section>
        <?php $this->load->view('leftsidebar');?>
        <?php $this->load->view('rightsidebar');?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- <?php echo $date = date('Y-m-d');?> -->
            <div id='calendar'></div>
        </div>
    </section>


    <?php $this->load->view('footern');?>
<script>

  $(document).ready(function() {
    var base = '<?= base_url()?>Admin_panel/diaryDetails/';
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd = '0'+dd
    } 

    if(mm<10) {
        mm = '0'+mm
    } 

    today = mm + '/' + dd + '/' + yyyy;
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: today,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
        <?php 
            $userID = $this->session->userdata('userID');
            $dd = $this->Rest_model->SelectDataOrder('diary','*',array('userID'=>$userID),'id','desc');
            foreach ($dd as $dd ) {
                
        ?>
        {
          title: '<?= $dd->dTitle?>',
          url: base+<?= $dd->id ?>,
          start: '<?= $dd->dDate ?>',
        },
        <?php }?>
        // {
        //   title: 'Long Event',
        //   start: '2018-03-07',
        //   end: '2018-03-10'
        // },
        // {
        //   id: 999,
        //   title: 'Repeating Event',
        //   start: '2018-03-09T16:00:00'
        // },
        // {
        //   id: 999,
        //   title: 'Repeating Event',
        //   start: '2018-03-16T16:00:00'
        // },
        // {
        //   title: 'Conference',
        //   start: '2018-03-11',
        //   end: '2018-03-13'
        // },
        // {
        //   title: 'Meeting',
        //   start: '2018-03-12T10:30:00',
        //   end: '2018-03-12T12:30:00'
        // },
        // {
        //   title: 'Lunch',
        //   start: '2018-03-12T12:00:00'
        // },
        // {
        //   title: 'Meeting',
        //   start: '2018-03-12T14:30:00'
        // },
        // {
        //   title: 'Happy Hour',
        //   start: '2018-03-12T17:30:00'
        // },
        // {
        //   title: 'Dinner',
        //   start: '2018-03-12T20:00:00'
        // },
        // {
        //   title: 'Birthday Party',
        //   start: '2018-03-13T07:00:00'
        // },
        // {
        //   title: 'Click for Google',
        //   url: base,
        //   start: '2018-11-30'
        // }
      ]
    });

  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
