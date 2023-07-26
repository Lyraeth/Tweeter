<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tweet extends Model
{
    use HasFactory;

    /*
    Merupakan cara lama untuk menampung parameter dari sebuah table
    kekurangannya ketika kita membuat row baru di table, kita harus merubah / menambahkan $fillable yang ada
    Contoh dalam  $fillable dibawah yang mempunyai row user_id dan content
    protected $fillable = ['user_id', 'content'];
    semisal kita menambahkan row baru di table Tweet (contoh: waktu_tweet), kita harus merubah $fillable tersebut menjadi
    protected $fillable = ['user_id', 'content', 'waktu_tweet'];

    sedangkan jika kita menggunakan $guarded, ketika kita menambahkan row baru di database, kita tidak perlu merubah
    $fillable ($guarded)

    atau bisa juga agar tidak ribet, bisa merubah file AppserviceProvider.php, dan tambahkan
    Model::unguard(); pada root
    dengan cara tersebut, kita tidak perlu lagi menggunakan $fillable ataupun $guarded
    */


    /*
    Fungsi BelongsTo merupakan penjelasan dari
    sebuah/banyaknya tweet hanya dimiliki oleh 1 user
    */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}