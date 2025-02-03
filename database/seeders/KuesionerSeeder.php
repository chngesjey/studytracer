<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\User;
use App\RoleEnum;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Apakah Anda bekerja saat ini?',
                'answers' => [
                    'Ya',
                    'Tidak',
                    'Sedang mencari pekerjaan',
                    'Sedang melanjutkan pendidikan'
                ]
            ],
            [
                'question' => 'Berapa lama waktu yang Anda butuhkan untuk mendapatkan pekerjaan pertama setelah lulus?',
                'answers' => [
                    'Kurang dari 1 bulan',
                    '1-3 bulan',
                    '4-6 bulan',
                    'Lebih dari 6 bulan'
                ]
            ],
            [
                'question' => 'Apa jenis pekerjaan Anda saat ini?',
                'answers' => [
                    'Pekerjaan tetap',
                    'Pekerjaan kontrak',
                    'Pekerjaan paruh waktu',
                    'Wirausaha'
                ]
            ],
            [
                'question' => 'Apakah pekerjaan Anda saat ini sesuai dengan bidang studi yang Anda pelajari di SMK Antartika 1 Sidoarjo?',
                'answers' => [
                    'Sangat sesuai',
                    'Cukup sesuai',
                    'Kurang sesuai',
                    'Tidak sesuai sama sekali'
                ]
            ],
            [
                'question' => 'Bagaimana Anda menemukan pekerjaan Anda saat ini?',
                'answers' => [
                    'Melalui iklan lowongan kerja',
                    'Rekomendasi teman/keluarga',
                    'Job fair',
                    'Portal pencarian kerja online'
                ]
            ],
            [
                'question' => 'Apakah Anda merasa pendidikan di SMK Antartika 1 mempersiapkan Anda dengan baik untuk pekerjaan Anda?',
                'answers' => [
                    'Sangat mempersiapkan',
                    'Cukup mempersiapkan',
                    'Kurang mempersiapkan',
                    'Tidak mempersiapkan sama sekali'
                ]
            ],
            [
                'question' => 'Apa tingkat pendapatan bulanan Anda saat ini?',
                'answers' => [
                    'Kurang dari Rp 2.000.000',
                    'Rp 2.000.000 - Rp 4.000.000',
                    'Rp 4.000.000 - Rp 6.000.000',
                    'Lebih dari Rp 6.000.000'
                ]
            ],
            // if answer first question is no quickly to this question, if yes load question on top after first question 
            [
                'question' => 'Apakah Anda pernah mengikuti pelatihan atau kursus tambahan setelah lulus dari SMK Antartika 1?',
                'answers' => [
                    'Ya, terkait bidang studi',
                    'Ya, tidak terkait bidang studi',
                    'Tidak, tetapi berencana',
                    'Tidak'
                ]
            ],
            [
                'question' => 'Seberapa sering Anda menggunakan keterampilan yang Anda pelajari di SMK Antartika 1 dalam pekerjaan Anda?',
                'answers' => [
                    'Setiap hari',
                    'Beberapa kali seminggu',
                    'Beberapa kali sebulan',
                    'Jarang atau tidak pernah'
                ]
            ],
            [
                'question' => 'Bagaimana Anda menilai kualitas fasilitas dan infrastruktur di SMK Antartika 1?',
                'answers' => [
                    'Sangat baik',
                    'Baik',
                    'Cukup',
                    'Kurang'
                ]
            ],
            [
                'question' => 'Bagaimana Anda menilai kualitas pengajaran di SMK Antartika 1?',
                'answers' => [
                    'Sangat baik',
                    'Baik',
                    'Cukup',
                    'Kurang'
                ]
            ],
            // this two
            [
                'question' => 'Apakah Anda melanjutkan pendidikan ke jenjang yang lebih tinggi setelah lulus dari SMK Antartika 1?',
                'answers' => [
                    'Ya',
                    'Tidak',
                    'Sedang berencana',
                    'Tidak, langsung bekerja'
                ]
            ],
            [
                'question' => 'Jika ya, di mana Anda melanjutkan pendidikan Anda?',
                'answers' => [
                    'Universitas',
                    'Politeknik',
                    'Akademi',
                    'Sekolah kejuruan lainnya'
                ]
            ],
            // if answer two question is no quickly to this question, if yes load question on top after two question 
            [
                'question' => 'Bagaimana Anda menilai relevansi kurikulum SMK Antartika 1 dengan kebutuhan industri saat ini?',
                'answers' => [
                    'Sangat relevan',
                    'Cukup relevan',
                    'Kurang relevan',
                    'Tidak relevan sama sekali'
                ]
            ],
            [
                'question' => 'Apakah Anda merasa jaringan alumni SMK Antartika 1 membantu dalam pengembangan karir Anda?',
                'answers' => [
                    'Sangat membantu',
                    'Membantu',
                    'Kurang membantu',
                    'Tidak membantu sama sekali'
                ]
            ],
            // three
            [
                'question' => 'Apakah Anda pernah menjalani magang selama di SMK Antartika 1?',
                'answers' => [
                    'Ya, di perusahaan besar',
                    'Ya, di perusahaan kecil',
                    'Ya, di lembaga pemerintah',
                    'Tidak pernah'
                ]
            ],
            [
                'question' => 'Bagaimana pengalaman magang Anda membantu dalam pekerjaan Anda saat ini?',
                'answers' => [
                    'Sangat membantu',
                    'Cukup membantu',
                    'Kurang membantu',
                    'Tidak membantu sama sekali'
                ]
            ],
            // if answer three question is no quickly to this question, if yes load question on top after three question

            // four
            [
                'question' => 'Apakah Anda terlibat dalam organisasi atau kegiatan ekstrakurikuler selama di SMK Antartika 1?',
                'answers' => [
                    'Ya, aktif di organisasi',
                    'Ya, aktif di kegiatan ekstrakurikuler',
                    'Tidak terlalu aktif',
                    'Tidak terlibat sama sekali'
                ]
            ],
            [
                'question' => 'Bagaimana pengalaman tersebut mempengaruhi pengembangan keterampilan Anda?',
                'answers' => [
                    'Sangat positif',
                    'Cukup positif',
                    'Kurang positif',
                    'Tidak berpengaruh'
                ]
            ],
            // if answer four question is no quickly to this question, if yes load question on top after four question 
            [
                'question' => 'Apakah Anda memiliki saran atau masukan untuk perbaikan SMK Antartika 1 di masa mendatang?',
                'answers' => [
                    'Lebih banyak pelatihan praktis',
                    'Peningkatan fasilitas',
                    'Peningkatan kualitas pengajaran',
                    'Program kerjasama dengan industri'
                ]
            ]
        ];
        $status = [
            'pertama', 'kedua', 'ketiga', 'keempat'
        ];
        $users = User::where('role', RoleEnum::Alumni->value)->get();
        foreach ($questions as $question) {
            $questionModel = Question::create([
                'slug' => Str::slug($question['question']),
                'name' => $question['question'],
            ]);
            $answers = [];
            foreach ($question['answers'] as $key => $answer) {
                $answerModel = Answer::create([
                    'question_id' => $questionModel->id,
                    'jawaban' => $answer,
                    'status' => $status[$key] // ini bisa disesuaikan atau di-random
                ]);

                $answers[] = $answerModel;
            }
            foreach ($users as $key => $user) {
                QuestionAnswer::create([
                    'user_id' => $user->id,
                    'question_id' => $questionModel->id,
                    'answer_id' => $answers[array_rand($answers)]->id // disini random id dari $questionModel->answer 
                ]);
            }
        }
    }
}