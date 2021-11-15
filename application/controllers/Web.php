<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Web extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	}

	//--------------------------------------------------------- login
	public function index() {
		$this->home();
	}

	public function view($file){
		$this->session->set_userdata('url', base_url().$file);		
		if (strpos($file, 'data-detail-') !== false){
			$this->detailanggota($file);
		}else if (strpos($file, '-warung-freelancer') !== false){
			$this->tambahan($file);
		} else if (strpos($file, 'daftar-jasa') !== false || strpos($file, 'daftar-artikel') !== false || strpos($file, 'daftar-anggota') !== false){
			$this->kategori($file);
		} else if (strpos($file, 'jasa') !== false || strpos($file, 'artikel') !== false){
			$this->session->set_userdata('schema 3', '');
			if (strpos($file, 'jasa') !== false){	
				$this->detailjasa($file);
			} else {
				$this->detailartikel($file);
			}
		} 
	}

	public function detailanggota($file){
		$optional = [];
        $optional['select'] = "";
        $where["field"][0] = "link";
		$where["velue"][0] = $file; 
		$optional['where'] = $where;
        $optional['search'] = "";
        $optional['distinct'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $dataAnggota = $this->modeladmin->ambil_data("admin_admin",$optional); 

		$optional = [];
        $optional['select'] = "";
        $where["field"][0] = "id";
		$where["velue"][0] = $dataAnggota[0]["kategori_id"]; 
		$optional['where'] = $where;
        $optional['search'] = "";
        $optional['distinct'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $dataKategori = $this->modeladmin->ambil_data("web_kategori",$optional); 

		$title = $dataAnggota[0]["nama"]." ".$dataAnggota[0]["jabatan"]." Warung Freelancer";
		$description = ucfirst(str_replace("-", " ", $file));
		$this->session->set_userdata('title', $title ); // ." | ".ucfirst(str_replace("-", " ", $dataKategori[0]["judul"]))
		$this->session->set_userdata('description', $title);

		$this->session->set_userdata('schema 1', '');
		$this->session->set_userdata('schema 2', '');
		$data['file'] = "web/detail/anggota";
		$this->load->view('web/themplate', $data);	
	}

	public function home(){
		$this->session->set_userdata('url', base_url());			
		$this->session->set_userdata('schema 1', '<script type="application/ld+json">
			{
			  "@context": "https://schema.org",
			  "@type": "ProfessionalService",
			  "name": "Warung Freelancer",
			  "image": "https://www.warungfreelancer.com/logo.png",
			  "@id": "https://www.warungfreelancer.com",
			  "url": "https://www.warungfreelancer.com/",
			  "telephone": "+6281906058312",
			  "priceRange": "10000 - 50000",
			  "address": {
			    "@type": "PostalAddress",
			    "streetAddress": "Kp Kosambi Cawang Ds Kendayakan Kec Kragilan",
			    "addressLocality": "Serang",
			    "postalCode": "42184",
			    "addressCountry": "ID"
			  },
			  "geo": {
			    "@type": "GeoCoordinates",
			    "latitude": -6.1503003,
			    "longitude": 106.2786937
			  },
			  "openingHoursSpecification": {
			    "@type": "OpeningHoursSpecification",
			    "dayOfWeek": [
			      "Monday",
			      "Tuesday",
			      "Wednesday",
			      "Thursday",
			      "Friday",
			      "Saturday",
			      "Sunday"
			    ],
			    "opens": "07:30",
			    "closes": "21:00"
			  },
			  "sameAs": [
			    "https://www.facebook.com/WarungFreelancer",
			    "https://twitter.com/WarungFreelance",
			    "https://www.instagram.com/warungfreelancer/",
			    "https://www.youtube.com/channel/UC5MwaCX1tVMCnseDNPdpreg",
			    "https://id.linkedin.com/company/warung-freelancer",
			    "https://www.warungfreelancer.com/",
			    "https://github.com/warungfreelancer"
			  ] 
			}
			</script>');


		$this->session->set_userdata('schema 2', '<script type="application/ld+json">
		{
		  "@context": "https://schema.org/",
		  "@type": "WebSite",
		  "name": "Warung Freelancer",
		  "url": "https://warungfreelancer.com",
		  "potentialAction": {
		    "@type": "SearchAction",
		    "target": "https://warungfreelancer.com/pencarian-warung-freelancer?cari={search_term_string}",
		    "query-input": "required name=search_term_string"
		  }
		}
		</script>');
		$this->session->set_userdata('schema 3', '');

		$this->session->set_userdata('title', "Team Freelancer Terbaik Di Indonesia | Warung Freelancer ");
		$this->session->set_userdata('description', "Warung Freelancer adalah komunitas freelancer dengan lebih dari 1000 orang. Kami melayani berbagai jasa digital seperti pembuatan review, design, backlink, dll.");
		$data['file'] = "web/home/index";
		$this->load->view('web/themplate', $data);
	}




	public function tambahan($file){
		$title = ucwords(str_replace("-", " ", str_replace("-warung-freelancer", "", $file)));
		$description = ucfirst(str_replace("-", " ", $file));

		$this->session->set_userdata('title', $title);
		if (strpos($file, 'Tentang') !== false){
				$this->session->set_userdata('title', $title." | Warung Freelancer");
		} 			
		$this->session->set_userdata('description', $title . " Warung Freelancer berisi berbagai macam data warung freelancer");
		$this->session->set_userdata('schema 1', '<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "ProfessionalService",
		  "name": "Warung Freelancer",
		  "image": "https://www.warungfreelancer.com/logo.png",
		  "@id": "https://www.warungfreelancer.com/'.$file.'",
		  "url": "'.$this->session->userdata('url').'",
		  "telephone": "+6281906058312",
		  "priceRange": "10000 - 50000",
		  "address": {
		    "@type": "PostalAddress",
		    "streetAddress": "Kp Kosambi Cawang Ds Kendayakan Kec Kragilan",
		    "addressLocality": "Serang",
		    "postalCode": "42184",
		    "addressCountry": "ID"
		  },
		  "geo": {
		    "@type": "GeoCoordinates",
		    "latitude": -6.1503003,
		    "longitude": 106.2786937
		  },
		  "openingHoursSpecification": {
		    "@type": "OpeningHoursSpecification",
		    "dayOfWeek": [
		      "Monday",
		      "Tuesday",
		      "Wednesday",
		      "Thursday",
		      "Friday",
		      "Saturday",
		      "Sunday"
		    ],
		    "opens": "07:30",
		    "closes": "21:00"
		  },
		  "sameAs": [
		    "https://www.facebook.com/WarungFreelancer",
		    "https://twitter.com/WarungFreelance",
		    "https://www.instagram.com/warungfreelancer/",
		    "https://www.youtube.com/channel/UC5MwaCX1tVMCnseDNPdpreg",
		    "https://id.linkedin.com/company/warung-freelancer",
		    "https://www.warungfreelancer.com/",
		    "https://github.com/warungfreelancer"
		  ] 
		}
		</script>');
		$this->session->set_userdata('schema 2', '');
		$this->session->set_userdata('schema 3', '');

		if (strpos($file, 'daftar') !== false){
			$data['file'] = "web/home/".str_replace("-warung-freelancer", "", $file);
			$this->load->view('web/themplate', $data);	
		} else {
			$data['file'] = "web/pelengkap/".str_replace("-warung-freelancer", "", $file);
			$this->load->view('web/themplate', $data);	
		}
	}





	public function kategori($file){
		$title = str_replace("Daftar ", "", ucwords(str_replace("-", " ", $file)));
			$description = ucfirst(str_replace("-", " ", $file));
			$this->session->set_userdata('title', $title." | Warung Freelancer");
			$this->session->set_userdata('description', $description." di Warung Freelancer");
			
			$this->session->set_userdata('schema 1', '<script type="application/ld+json">
			{
			  "@context": "https://schema.org",
			  "@type": "ProfessionalService",
			  "name": "Warung Freelancer",
			  "image": "https://www.warungfreelancer.com/logo.png",
			  "@id": "https://www.warungfreelancer.com",
			  "url": "'.$this->session->userdata('url').'",
			  "telephone": "+6281906058312",
			  "priceRange": "10000 - 50000",
			  "address": {
			    "@type": "PostalAddress",
			    "streetAddress": "Kp Kosambi Cawang Ds Kendayakan Kec Kragilan",
			    "addressLocality": "Serang",
			    "postalCode": "42184",
			    "addressCountry": "ID"
			  },
			  "geo": {
			    "@type": "GeoCoordinates",
			    "latitude": -6.1503003,
			    "longitude": 106.2786937
			  },
			  "openingHoursSpecification": {
			    "@type": "OpeningHoursSpecification",
			    "dayOfWeek": [
			      "Monday",
			      "Tuesday",
			      "Wednesday",
			      "Thursday",
			      "Friday",
			      "Saturday",
			      "Sunday"
			    ],
			    "opens": "07:30",
			    "closes": "21:00"
			  },
			  "sameAs": [
			    "https://www.facebook.com/WarungFreelancer",
			    "https://twitter.com/WarungFreelance",
			    "https://www.instagram.com/warungfreelancer/",
			    "https://www.youtube.com/channel/UC5MwaCX1tVMCnseDNPdpreg",
			    "https://id.linkedin.com/company/warung-freelancer",
			    "https://www.warungfreelancer.com/",
			    "https://github.com/warungfreelancer"
			  ] 
			}
			</script>');

			$this->session->set_userdata('schema 2', '');
			$this->session->set_userdata('schema 3', '<script type="application/ld+json">
			    {
			      "@context": "https://schema.org",
			      "@type": "BreadcrumbList",
			      "itemListElement": [{
			        "@type": "ListItem",
			        "position": 1,
			        "name": "'.$title.'"
			      }]
			    }
			    </script>
			');

			if (strpos($file, 'daftar-artikel') !== false){
				$this->session->set_userdata('title', $title." | Daftar Artikel Warung Freelancer");
				$data['file'] = "web/daftar/artikel";				
			} else if (strpos($file, 'daftar-jasa') !== false) {
				$data['file'] = "web/daftar/jasa";				
			} else if (strpos($file, 'daftar-anggota') !== false) {
				$data['file'] = "web/daftar/anggota";				
			}

			$this->load->view('web/themplate', $data);	
	}




	public function detailjasa($file){
		$optional = [];
        $optional['select'] = "";
        $where["field"][0] = "link";
		$where["velue"][0] = $file; 
		$optional['where'] = $where;
        $optional['search'] = "";
        $optional['distinct'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $dataJasa = $this->modeladmin->ambil_data("web_jasa",$optional); 

		$optional = [];
        $optional['select'] = "";
        $where["field"][0] = "id";
		$where["velue"][0] = $dataJasa[0]["kategori_id"]; 
		$optional['where'] = $where;
        $optional['search'] = "";
        $optional['distinct'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $dataKategori = $this->modeladmin->ambil_data("web_kategori",$optional); 

		$title = $dataJasa[0]["judul"];
		$description = ucfirst(str_replace("-", " ", $file));
		$this->session->set_userdata('title', $title ); // ." | ".ucfirst(str_replace("-", " ", $dataKategori[0]["judul"]))
		$this->session->set_userdata('description', $title." dengan harga terbaik dan kualitas luar biasa");

		$this->session->set_userdata('schema 1', '<script type="application/ld+json">
		{
		  "@context": "https://schema.org/", 
		  "@type": "Product", 
		  "name": "'.$this->session->userdata('title').'",
		  "image": "'.base_url().'gambar/jasa/'.$file.'.jpeg",
		  "description": "'.$this->session->userdata('description').'",
		  "brand": "Warung Freelancer",
		  "sku": "as",
		  "offers": {
		    "@type": "Offer",
		    "url": "'.base_url().$file.'",
		    "priceCurrency": "IDR",
		    "price": "15.000",
		    "priceValidUntil": "2021-12-12",
		    "availability": "https://schema.org/InStock",
		    "itemCondition": "https://schema.org/NewCondition"
		  },
		  "aggregateRating": {
		    "@type": "AggregateRating",
		    "ratingValue": "4.86",
		    "bestRating": "5",
		    "worstRating": "0",
		    "ratingCount": "38"
		  }
		}
		</script>');
	$this->session->set_userdata('schema 2', '<script type="application/ld+json">
	    {
	      "@context": "https://schema.org",
	      "@type": "BreadcrumbList",
	      "itemListElement": [{
	        "@type": "ListItem",
	        "position": 1,
	        "name": "'.ucfirst(str_replace("-", " ", $dataKategori[0]["judul"])).'",
	        "item": "'.base_url().$dataKategori[0]["link"].'"
	      },{
	        "@type": "ListItem",
	        "position": 2,
	        "name": "'.$title.'"
	      }]
	    }
	    </script>');
		$data['file'] = "web/detail/jasa";
		$this->load->view('web/themplate', $data);	
	}

	public function detailartikel($file){
		$optional = [];
        $optional['select'] = "";
        $where["field"][0] = "link";
		$where["velue"][0] = $file; 
		$optional['where'] = $where;
        $optional['search'] = "";
        $optional['distinct'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $dataJasa = $this->modeladmin->ambil_data("web_artikel",$optional); 


		$optional = [];
        $optional['select'] = "";
        $where["field"][0] = "id";
		$where["velue"][0] = $dataJasa[0]["kategori_id"]; 
		$optional['where'] = $where;
        $optional['search'] = "";
        $optional['distinct'] = "";
        $optional['join'] = "";
        $optional['order_by'] = "";
        $optional['limit'] = "";
        $optional['offset'] = "";
        $dataKategori = $this->modeladmin->ambil_data("web_kategori",$optional); 

		$title = $dataJasa[0]["judul"];
		$description = ucfirst(str_replace("-", " ", $file));
		$this->session->set_userdata('title', $title." | ".ucfirst(str_replace("-", " ", $dataKategori[0]["judul"])));
		$this->session->set_userdata('description', $title." dengan harga terbaik dan kualitas luar biasa");

		$this->session->set_userdata('schema 1', '');
		$this->session->set_userdata('schema 2', '<script type="application/ld+json">
	    {
	      "@context": "https://schema.org",
	      "@type": "BreadcrumbList",
	      "itemListElement": [{
	        "@type": "ListItem",
	        "position": 1,
	        "name": "'.ucfirst(str_replace("-", " ", $dataKategori[0]["judul"])).'",
	        "item": "'.base_url().$dataKategori[0]["link"].'"
	      },{
	        "@type": "ListItem",
	        "position": 2,
	        "name": "'.$title.'"
	      }]
	    }
	    </script>');
		$data['file'] = "web/detail/artikel";		
		$this->load->view('web/themplate', $data);	
	}
}