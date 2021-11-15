	<?php $this->load->view('admin/themplate/header'); ?>

<body>
	<?php $this->load->view('admin/themplate/sidebar'); ?>
    <div class="all-content-wrapper">


		<?php 
        if($file == "admin/dashboard"){
            $this->load->view('admin/themplate/home-headbar');
        }else{
            $this->load->view('admin/themplate/normal-headbar'); 
        }

        $this->load->view($file); 
        ?>



    <?php $this->load->view('admin/themplate/footer'); ?>



<?php if(strpos($file, "admin/data") !== false) { ?>
    <script type="text/javascript">
    var qsRegex;

    var $grid = $('.grid').isotope({
      itemSelector: '.element-item',
      layoutMode: 'fitRows',
      filter: function() {
        return qsRegex ? $(this).text().match( qsRegex ) : true;
      }
    });

    var $quicksearch = $('.quicksearch').keyup( debounce( function() {
      qsRegex = new RegExp( $quicksearch.val(), 'gi' );
      $grid.isotope();
    }, 200 ) );

    function debounce( fn, threshold ) {
      var timeout;
      threshold = threshold || 100;
      return function debounced() {
        clearTimeout( timeout );
        var args = arguments;
        var _this = this;
        function delayed() {
          fn.apply( _this, args );
        }
        timeout = setTimeout( delayed, threshold );
      };
    }
    </script>
<?php } ?>