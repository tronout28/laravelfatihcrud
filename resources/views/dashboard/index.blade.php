@extends('dashboard.layouts.main')

@section('container')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div>
            <div>
                <div>
                    update, <b>23 februari 2024</b>
                </div>
               <br>
                <h1>Selamat Datang</h1>
                <br>
                <h3> {{ Auth::user()->name }}</h3>
                <hr>

                <p>
                    Hari ini merupakan kesempatan baru bagi kita untuk menginspirasi dan memotivasi siswa-siswa kita. Hari ini Anda mengajar di kelas [nama kelas], di mana kita akan berinteraksi dengan siswa dari berbagai kelas yang berbeda. Ini adalah kesempatan yang luar biasa untuk membentuk ikatan yang lebih kuat dengan siswa-siswa kita, dan membawa keajaiban pembelajaran ke dalam kelas ini.
                    Mari kita berbagi pengetahuan, pengalaman, dan semangat kita untuk menciptakan lingkungan belajar yang menyenangkan dan bermakna. Dengan kerja sama dan dedikasi, kita dapat membimbing setiap siswa menuju kesuksesan.
                    Terima kasih atas komitmen dan dedikasi Anda dalam memajukan pendidikan. Semoga hari ini menjadi pengalaman yang memuaskan dan bermanfaat bagi kita semua.
                    Selamat mengajar!
                </p>
            </div>
            <div>    
                <h2>{{ Auth::user()->name }}</h2>
                <hr>                
                <p>
                    Nama: {{ Auth::user()->name }}
                    <br> 
                    Pendidikan: Sarjana Pendidikan Matematika
                    <br> <hr>
                    Pengalaman Mengajar: Lebih dari 10 tahun pengalaman mengajar di berbagai tingkatan pendidikan, mulai dari SD hingga perguruan tinggi.
                    <br>
                    Spesialisasi: Matematika, Pembelajaran Aktif, Pengembangan Kurikulum
                    <br>
                    Filosofi Mengajar: "Setiap siswa memiliki potensi yang luar biasa. Tugas saya sebagai guru adalah membantu mereka menemukan dan mengembangkan potensi tersebut melalui pembelajaran yang menyenangkan, interaktif, dan relevan dengan kehidupan sehari-hari."
                    <br>
                    Penghargaan dan Prestasi: Penerima beberapa penghargaan sebagai Guru Inspiratif dan Inovatif dalam Pengajaran Matematika.
                    <br>
                    Pengalaman Ekstrakurikuler: Pembina beberapa klub matematika dan aktif dalam kegiatan sosial di lingkungan sekolah.
                    <br>
                    Motivasi: "Saya percaya bahwa pendidikan adalah kunci untuk membuka pintu menuju masa depan yang cerah bagi setiap individu. Saya berkomitmen untuk terus menginspirasi dan membimbing siswa-siswa saya menuju kesuksesan."
                </p>
            </div>
            <footer>
                <p>Kesiswaan &copy; 2024, by Fatih Abdurrahman Didar</p>
            </footer>
        </div>
    
@endsection