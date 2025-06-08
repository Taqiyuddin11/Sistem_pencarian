<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UM Search Engine</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Definisi Palet Warna */
            --primary-blue: #4A90E2;       /* Warna tombol utama */
            --primary-blue-dark: #3F7ACB;  /* Warna tombol saat hover */
            --light-grey-bg: #F0F4F8;      /* Background form */
            --page-bg: #FDFDFD;            /* Background halaman */
            --dark-text: #333333;          /* Warna teks gelap */
            --medium-text: #555555;        /* Warna teks menengah */
            --light-text: #AAAAAA;         /* Warna teks footer */
            --border-color: #DDE5ED;       /* Warna border input */
            --shadow-light: rgba(0, 0, 0, 0.08); /* Bayangan elemen ringan */
            --shadow-medium: rgba(0, 0, 0, 0.15); /* Bayangan elemen menengah */
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: var(--page-bg);
            color: var(--dark-text);
            font-size: 1rem; /* Ukuran font dasar */
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Memusatkan vertikal */
            align-items: center;     /* Memusatkan horizontal */
            padding: 2rem 1rem;      /* Padding agar tidak terlalu mepet tepi */
            box-sizing: border-box;  /* Pastikan padding tidak menambah lebar/tinggi */
        }

        h2 {
            color: var(--dark-text);
            margin-bottom: 0.8rem; /* Kurangi margin bawah */
            font-size: 2.5rem;     /* Ukuran font lebih besar */
            font-weight: 700;      /* Lebih tebal */
            text-align: center;
        }

        .subheading {
            color: var(--medium-text);
            font-size: 1.1rem;
            margin-bottom: 2.5rem; /* Jarak bawah yang cukup dari form */
            text-align: center;
        }

        form {
            background-color: var(--light-grey-bg);
            padding: 2.5rem; /* Padding lebih proporsional */
            border-radius: 12px;
            box-shadow: 0 12px 25px var(--shadow-medium); /* Bayangan lebih dalam */
            display: flex;
            gap: 1rem; /* Jarak antar elemen dalam form */
            flex-wrap: wrap; /* Pastikan responsif */
            justify-content: center;
            align-items: center; /* Memusatkan item dalam form */
            max-width: 600px; /* Batasi lebar form */
            width: 100%; /* Lebar penuh dalam max-width */
        }

        input[type="text"] {
            flex-grow: 1; /* Input akan mengambil ruang yang tersedia */
            min-width: 250px; /* Lebar minimum agar tidak terlalu kecil */
            padding: 0.8rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-sizing: border-box; /* Pastikan padding tidak menambah lebar */
        }

        input[type="text"]:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2); /* Bayangan fokus */
        }

        button {
            padding: 0.8rem 1.8rem;
            background-color: var(--primary-blue);
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px var(--shadow-light); /* Bayangan tombol */
        }

        button:hover {
            background-color: var(--primary-blue-dark);
            transform: translateY(-2px); /* Efek angkat saat hover */
            box-shadow: 0 6px 12px var(--shadow-medium); /* Bayangan lebih dalam saat hover */
        }

        button:active {
            transform: translateY(0); /* Kembali saat diklik */
            box-shadow: 0 2px 4px var(--shadow-light);
        }

        footer {
            margin-top: 4rem; /* Jarak dari form ke footer */
            padding: 1rem;
            color: var(--light-text);
            font-size: 0.9rem;
            text-align: center;
            width: 100%;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            h2 {
                font-size: 2rem;
            }
            .subheading {
                font-size: 1rem;
            }
            form {
                padding: 1.5rem;
                flex-direction: column;
                gap: 1rem;
                border-radius: 10px;
            }
            input[type="text"] {
                min-width: unset; /* Hapus min-width */
                width: 100%; /* Ambil lebar penuh */
            }
            button {
                width: 100%; /* Ambil lebar penuh */
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <h2>Search Engine UM</h2>
    <p class="subheading">Search UM webpages ranked by PageRank algorithm</p>
    
    <form method="post" action="/search/result">
        <input type="text" name="keyword" placeholder="Search UM site..." required>
        <button type="submit">Search</button>
    </form>
    
    <footer>
        &copy; <?php echo date('Y'); ?> UM Simple Search - Powered by CodeIgniter 4 and PageRank
    </footer>

</body>
</html>