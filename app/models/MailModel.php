<?php

use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/../../app/lib/PHPMailer/src/Exception.php';
require __DIR__ . '/../../app/lib/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/../../app/lib/PHPMailer/src/SMTP.php';

class MailModel
{
    private $mail;
    private $subject;
    private $messageBody;

    function __construct()
    {
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 2525;
        $this->mail->Username = 'b5d94728645ebc';
        $this->mail->Password = '21f5c1e1410a20';
    }

    public function sendMailAccept($data, $type)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $jenis = $data['jenis'];
        $tgl_pinjam = $data['tanggal_pinjam'];
        $tgl_kembali = $data['tanggal_kembali'];
        $total = $data['total'];

        if ($type == 'tolak') {
            $this->subject = "Transaksi Rental Ditolak";
            $this->messageBody = "Transaksi anda ditolak";
        } else {
            $this->mail->isHTML(true);
            $this->subject = "Transaksi Rental Diterima";
            $this->messageBody = "<table class='table table-bordered' style='border: 1px solid black; border-collapse: collapse;'>
        <thead>
          <tr>
            <th style='border: 1px solid black; border-collapse: collapse;' >Nama</th>
            <th style='border: 1px solid black; border-collapse: collapse;' >Email</th>
            <th style='border: 1px solid black; border-collapse: collapse;' >Jenis PS</th>
            <th style='border: 1px solid black; border-collapse: collapse;' >Tanggal Pinjam</th>
            <th style='border: 1px solid black; border-collapse: collapse;' >Tanggal Kembali</th>
            <th style='border: 1px solid black; border-collapse: collapse;' >Total (Rp)</th>
          </tr>
        </thead>
        <tbody>
        <tr>
                  <td style='border: 1px solid black; border-collapse: collapse;'> $nama </td>
                  <td style='border: 1px solid black; border-collapse: collapse;'>$email</td>
                  <td style='border: 1px solid black; border-collapse: collapse;'>$jenis</td>
                  <td style='border: 1px solid black; border-collapse: collapse;'>$tgl_pinjam</td>
                  <td style='border: 1px solid black; border-collapse: collapse;'>$tgl_kembali</td>
                  <td style='border: 1px solid black; border-collapse: collapse;'>$total</td>
                  </tr>
        </table>";
        }
        $this->mail->setFrom("info@rentalbasudara.com", "Info Rental Basudara");
        $this->mail->addAddress($email, $nama);
        $this->mail->Subject = $this->subject;
        $this->mail->Body = $this->messageBody;


        if (!$this->mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            $data = array("msg" => $this->mail->ErrorInfo, "status" => 0);
            return $data;
        } else {
            echo 'Message has been sent';
            $data = array("msg" => "Message send", "status" => 1);
            return $data;
        }
    }
}
