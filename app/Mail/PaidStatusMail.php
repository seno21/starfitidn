<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class PaidStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $status;
    public $amount;
    public $user;
    public $payment_date;
    public $payment_method;
    public $transaction;
    public $description;
    public $payment_channel;
    public $no_bib;
    public $slug;

    /**
     * Create a new message instance.
     */
    public function __construct($request)
    {
        $this->status = $request['status'];
        $this->amount = $request['amount'];
        $this->user = $request['user'];
        $this->payment_date = Carbon::parse($request['payment_date'])->timezone('Asia/Jakarta')->format('d F Y H:i:s');
        $this->payment_method = $request['payment_method'];
        $this->transaction = $request['transaction'];
        $this->description = $request['description'];
        $this->payment_channel = $request['payment_channel'];
        $this->no_bib = $request['no_bib'] ?? null;
        $this->slug = $request['slug'] ?? null;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Paid Status',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $data = [
            'status' => $this->status,
            'amount' => $this->amount,
            'user' => $this->user,
            'payment_date' => $this->payment_date,
            'payment_method' => $this->payment_method,
            'transaction' => $this->transaction,
            'description' => $this->description,
            'payment_channel' => $this->payment_channel,
            'no_bib' => $this->no_bib,
            'slug' => $this->slug,
        ];
        return new Content(
            view: 'emails.paid_status',
            with: ['data' => $data],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
