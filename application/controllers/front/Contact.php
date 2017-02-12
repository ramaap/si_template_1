<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Model template
        $this->load->model('data_profile');
        $this->load->model('data_contact');

        // Place your model here...
    }

	public function index() {
        // $this->lib->check_session_customer();
        $this->lib->check_lokasi("Contact");     
        $this->load->view('front/pages/contact');
    }
	public function Post()
    {
			$ci = get_instance();
            
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'mail.pixaonline.com', //change this
				'smtp_port' => 587,
				'smtp_user' => 'contact@pixaonline.com',
				'smtp_pass' => 'pixaonline1234',
				'mailtype'  => 'html', 
				'charset'   => 'iso-8859-1'
			);
			$ci->load->library('email', $config);
			$ci->email->initialize($config);
	 
			$ci->email->from('contact@pixaonline.com', 'pixaonline.com');
			$list = array('contact@pixaonline.com');
			$email = $this->input->post('email');
			$name = $this->input->post('nama');
			$telp = $this->input->post('telp');
			$subject = $this->input->post('subject');
			$pesan = $this->input->post('pesan');
			$message ='<b>Nama :</b><br/>'. $name. '<br/><br/><b>E-mail :</b><br/>' . $email. '<br/><br/><b>Pesan :</b><br/>' . $telp. '<br/><br/><br/><br/>'. $pesan. '<br/><br/><br/><br/>
			Dikirim melalui kontak website Pixa Online | pixaonline.com
						'; 
						
			$ci->email->to($list);
			$ci->email->subject('pixaonline.com');
			$ci->email->message($message);
			if ($this->email->send()) 
			{
				
				$email = $this->input->post('mail');
				$ci->email->from('contact@pixaonline.com', 'Pixa Online | pixaonline.com');
				$list = array($email);
				$email = $this->input->post('email');
				$name = $this->input->post('nama');
				$telp = $this->input->post('telp');
				$pesan = $this->input->post('pesan');
				$message =	'Dear '.$name.', <br/><br/>
							Thank you for your message.<br/>
							We will respond your message in 2 days.<br/><br/>
							If you need more information, please contact us.<br/><br/>
							Best Regards,<br/>
							Pixa Online <br/>
							Address: Ruko Yap Square No 7C jl. C Simanjuntak, Yogyakarta<br/>
							Email: pixacreative@gmail.com <br/>
							Phone/Fax:0274-553700 <br/>
						';
				
				$ci->email->to($list);
				$ci->email->subject('Pixa Online | pixaonline.com Reply to: '.$name);
				$ci->email->message($message);
				if ($this->email->send()) 
				{  
					echo "<script>
						alert('Email sent!');
						</script>";             
						redirect('front/contact','refresh');
				}
				else
				{
					echo "<script>
						alert('Email failed to send!');
						</script>"; 
					show_error($this->email->print_debugger());
				} 
				  
						
			} 
			else
			{
					echo "<script>
							alert('Email failed to send!');
							</script>"; 
				show_error($this->email->print_debugger());
			}  
    }
	public function add_newsletter()
    {
			// $ci = get_instance();
            
			// $config = array(
				// 'protocol' => 'smtp',
				// 'smtp_host' => 'mail.pixaonline.com', //change this
				// 'smtp_port' => 587,
				// 'smtp_user' => 'contact@pixaonline.com',
				// 'smtp_pass' => 'pixaonline1234',
				// 'mailtype'  => 'html', 
				// 'charset'   => 'iso-8859-1'
			// );
			// $ci->load->library('email', $config);
			// $ci->email->initialize($config);
	 
			// $ci->email->from('contact@pixaonline.com', 'pixaonline.com');
			// $list = array('contact@pixaonline.com');
			// $email = $this->input->post('mail');
			// $message ='<b>Nama :</b><br/>'. $email.  '<br/><br/>Berlanggan Newsletter Pixa Online<br/><br/>
			// Dikirim melalui form newsletter website Pixa Online | pixaonline.com
						// '; 
						
			// $ci->email->to($list);
			// $ci->email->subject('pixaonline.com');
			// $ci->email->message($message);
			// if ($this->email->send()) 
			// {
				
				// $email = $this->input->post('mail');
				// $ci->email->from('contact@pixaonline.com', 'Pixa Online | pixaonline.com');
				// $list = array($email);
				// $email = $this->input->post('mail');
				// $name = $this->input->post('name');
				// $pesan = $this->input->post('message');
				// $message =	'Dear '.$name.', <br/><br/>
							// Thank you for subscribe our Newsletter.<br/>
							// We will back to you with interesting offer and promo.<br/><br/>
							// Best Regards,<br/>
							// Pixa Online <br/>
							// Address: Ruko Yap Square No 7C jl. C Simanjuntak, Yogyakarta<br/>
							// Email: pixacreative@gmail.com <br/>
							// Phone/Fax:0274-553700 <br/>
						// ';
				
				// $ci->email->to($list);
				// $ci->email->subject('Pixa Online | pixaonline.com Reply to: '.$name);
				// $ci->email->message($message);
				// if ($this->email->send()) 
				// {  
				  $param = array(
					   'email' => $this->input->post('email')
					   );
					   
					$this->data_contact->insert($param); 
					echo "<script>
						alert('Email sent!');
						</script>";             
						redirect('front/home','refresh');
				// }
				// else
				// {
					// echo "<script>
						// alert('Email failed to send!');
						// </script>"; 
					// show_error($this->email->print_debugger());
				// } 
				  
						
			// } 
			// else
			// {
					// echo "<script>
							// alert('Email failed to send!');
							// </script>"; 
				// show_error($this->email->print_debugger());
			// }  
    }
}
