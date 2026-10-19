<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mail_templates', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('subject');
            $table->string('heading')->nullable();
            $table->text('body');
            $table->boolean('is_enabled')->default(true);
            $table->timestamps();
        });

        // The two contact-form emails always exist; admins edit, never create or delete them.
        $now = now();

        DB::table('mail_templates')->insert([
            [
                'key' => 'enquiry_admin',
                'name' => 'New enquiry (to admin)',
                'description' => 'Sent to the admin recipients when someone submits the contact form.',
                'subject' => 'New enquiry from {name}',
                'heading' => 'New website enquiry',
                'body' => implode("\n", [
                    'A new enquiry has arrived from the website.',
                    '',
                    '**Name:** {name}  ',
                    '**Phone:** {phone}  ',
                    '**Email:** {email}  ',
                    '**Town:** {town}  ',
                    '**Interested in:** {interested_in}',
                    '',
                    '**Message**',
                    '',
                    '{message}',
                    '',
                    'Sent from {source_url} on {submitted_at}.',
                ]),
                'is_enabled' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'key' => 'enquiry_customer',
                'name' => 'Enquiry received (to customer)',
                'description' => 'Sent to the customer, if they gave an email address, to confirm we received their enquiry.',
                'subject' => 'We received your enquiry, {name}',
                'heading' => 'Thank you, {name}',
                'body' => implode("\n", [
                    'Thank you for contacting {site_name}. We have received your enquiry and will reply soon with today’s rate and stock details.',
                    '',
                    '**Your message**',
                    '',
                    '{message}',
                    '',
                    'For a faster reply, WhatsApp us on {whatsapp}, or visit our showroom on Rambaug Road, Adipur.',
                    '',
                    'Regards,  ',
                    '{site_name}',
                ]),
                'is_enabled' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_templates');
    }
};
