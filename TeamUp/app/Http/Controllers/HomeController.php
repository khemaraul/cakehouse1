<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webklex\IMAP\Client;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            return view('dashboard', compact('aMessage'));


    }
    public function store()
    {
        /*$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'khemaraul1996@gmail.com';
        $password = 'Khema@123';

        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect: ' . imap_last_error());

        $emails = imap_search($inbox, 'ALL');

        if ($emails) {
            $output = '';
            $mails = array();

            rsort($emails);

            foreach ($emails as $email_number) {
                $header = imap_headerinfo($inbox, $email_number);
                $message = quoted_printable_decode (imap_fetchbody($inbox, $email_number, 1));

                $from = $header->from[0]->mailbox . "@" . $header->from[0]->host;
                $toaddress = $header->toaddress;
                if(imap_search($inbox, 'UNSEEN')){
                    DB::table('email')->insert(['from'=>$from, 'body'=>$message]);
                    return back()->with('success', 'insert success');
                }
                else{
                    return back()->with('success', 'insert unsuccessful');

                }
            }
        }
            imap_close($inbox);*/
            $oClient = new Client([
                'host'          => 'imap.gmail.com',
                'port'          => 993,
                'encryption'    => 'ssl',
                'validate_cert' => true,
                'username'      => 'khemaraul1996@gmail.com',
                'password'      => 'Khema@123',
                'protocol'      => 'imap'
            ]);
            //Connect to the IMAP Server
            $oClient->connect();
            $aFolder = $oClient->getFolders();
            foreach($aFolder as $oFolder){

                //Get all Messages of the current Mailbox $oFolder
                /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
                $aMessage = $oFolder->messages()->all()->get();

                /** @var \Webklex\IMAP\Message $oMessage */
                foreach($aMessage as $oMessage){
                    $from = $oMessage->getSubject();
                    $message = $oMessage->getAttachments()->count();
                    //echo $oMessage->getHTMLBody(true);
                    DB::table('email')->insert(['from'=>$from, 'body'=>$message]);
                    return back()->with('success', 'insert success');
                }
            }
        }
}
