<?php

class Officer extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();


    }

    public function index() {
        $logged = Session::get('loggedIn');
        $role = Session::get('role');
        $data = array(
            'role' => $role
        );
        if(($role=='officer'|| 'admin') && $logged==true)

            $this->view->rendor('officer/index', $data);
        else {
            $data['errMsg'] = "Unuthorized Acces ! Only Officers & Admins can visit the requested page";
            $this->view->rendor('error/index', $data);
        }
            
    }

    public function cropReq() {
        $cropReqData = [
            [
                'farmer' => "Nimal Siripala",
                'crop' => "Potatoe-CG1",
                'period' => "7 weeks",
                'area' => "Udawalawe-north",
                'harvest' => "1.2 MT",
                'demand' => "Below",
                'dateTime' => "10-05-2020 | 10.00 AM"
            ],
            [
                'farmer' => "Nimal Siripala",
                'crop' => "Potatoe-CG1",
                'period' => "7 weeks",
                'area' => "Udawalawe-north",
                'harvest' => "1.2 MT",
                'demand' => "Below",
                'dateTime' => "10-05-2020 | 10.00 AM"
            ],
            [
                'farmer' => "Nimal Siripala",
                'crop' => "Potatoe-CG1",
                'period' => "7 weeks",
                'area' => "Udawalawe-north",
                'harvest' => "1.2 MT",
                'demand' => "Below",
                'dateTime' => "10-05-2020 | 10.00 AM"
            ],
            [
                'farmer' => "Nimal Siripala",
                'crop' => "Potatoe-CG1",
                'period' => "7 weeks",
                'area' => "Udawalawe-north",
                'harvest' => "1.2 MT",
                'demand' => "Below",
                'dateTime' => "10-05-2020 | 10.00 AM"
            ],

        ];

        $pageData = [
            'role' => Session::get('role'),
            'cropReqData' => $cropReqData,
        ];
        // Session::set('activePage', 'cropReq');
        $this->view->js = 'officer/js/default';
        $this->setActivePage('cropReq');
        $this->view->rendor('officer/cropReq', $pageData);
    }

    public function damageClaims() {

        $dmgClaimData = [
            [
                'farmer' => "Amal Lakshan",
                'crops' => "Beans, Carrot",
                'area' => "Kandy",
                'damageAmt' => "1 hectares",
            ],
            [
                'farmer' => "Suneetha Madawala",
                'crops' => "Pumpkin, Carrot",
                'area' => "Horowpathana-south",
                'damageAmt' => "2 hectares",
            ],
            [
                'farmer' => "Nalin Jeewaka",
                'crops' => "Tomatoe",
                'area' => "Badulla",
                'damageAmt' => "2.5 hectares",
            ]
        ];
        $data = [
            'dmgClaimData' => $dmgClaimData ];
        $this->setActivePage('damageClaims');
        $this->view->rendor('officer/damageClaims', $data);
    }

    function editDmg() {
        
        $this->view->rendor('officer/editDmg');
    }

    function saveDmg() {
        header('location: '. URL .'officer/damageClaims');
    }

    public function reports() {
        $data = [];
        $this->setActivePage('reports');
        $this->view->rendor('officer/reports', $data);
    }

    public function notifications() {
        $data = [];
        $this->setActivePage('notifications');
        $this->view->rendor('officer/notifications', $data);
    }

    public function register(){
        $this->view->rendor('officer/register');
    }

    //view list of officers by the admin
    public function officers(){

        //only for admin can execute this
        if( Session::get('loggedIn') == false || Session::get('role') != 'admin') {
            Session::destroy();
            header('location: '. URL .'user/login');
            exit;
        }
        
        $officerData = $this->model->officerList();

        $pageData = [
            'role' => Session::get('role'),
            'tabs' => [ ['label' =>'<i class="fas fa-user-plus"></i> Register New Officer',
                          'path' => 'user/register'
                        ]        
                      ],
            'officerData' => $officerData,
        ];
        $this->setActivePage('userMgt');
        $this->view->rendor('officer/officers', $pageData);
    }

    public function sendmail() {

        $mailbody = '
            <div class="" style="background:#ccc; font-size:1.2em; padding:10px; font-family:sans-serif;">
            <h2>Hellooo user.. welcome here</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor scelerisque est a consequat. Duis et massa nec nunc mattis feugiat sit amet porttitor purus. Fusce ultricies vitae augue eget pharetra. Morbi sed diam mattis, pellentesque ligula scelerisque, semper mauris. Cras tempus pretium odio, et ullamcorper turpis ultricies sed. Maecenas a sodales risus. In consequat malesuada sapien vel bibendum. Maecenas accumsan justo ut ultrices tincidunt. Integer faucibus quam ac nisi mattis, eu convallis dui condimentum. Phasellus iaculis magna in enim iaculis, eget fermentum velit condimentum. Cras a pretium tortor, sed consequat tellus. Nullam nisi erat, mollis at nisl vitae, euismod convallis lorem. Donec facilisis ipsum sit amet odio iaculis auctor.

            </p>
        </div>

        ';

        $mailInfo = [
            'body' => $mailbody,
            'subject' => 'Welcome to Ran Aswanu',
            'address' => 'dimuthudhanushka8@gmail.com',
        ];

        // $mymail = new Email();
        // $mymail->sendmail($mailInfo);

    }

}

        