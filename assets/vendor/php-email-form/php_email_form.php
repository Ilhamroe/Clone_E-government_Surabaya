<?php
class PHP_Email_Form
{
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $message;
    public $ajax;

    public function add_message($message, $label, $priority = 0)
    {
        $this->message .= "$label: $message\n";
    }

    public function send()
    {
        $headers = "From: " . $this->from_name . " <" . $this->from_email . ">\r\n";
        if ($this->ajax) {
            $headers .= "Content-type: text/html\r\n";
        }
        return mail($this->to, $this->subject, $this->message, $headers);
    }
}
?>