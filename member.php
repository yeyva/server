<?php session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT Website</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #e8f1ff; /* Голубой фон */
        color: #333; /* Цвет текста */
    }

    header {
        background-color: #003366; /* Темно-синий фон */
        color: #fff;
        text-align: center;
        padding: 20px;
    }

    .header-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .gradient-text {
        background: linear-gradient(90deg, #4e9af1, #00b4db);
        -webkit-background-clip: text;
        background-clip: text; /* Добавлено стандартное свойство для совместимости */
        color: transparent;
        font-size: 30px; /* Размер текста */
        font-weight: bold; /* Жирный шрифт */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Тень текста */
        -webkit-text-stroke: 1px #000; /* Обводка черным цветом */
    }
    .gradient-text2 {
        background: linear-gradient(90deg, #00d9ff, #001aff);
        -webkit-background-clip: text;
        background-clip: text; /* Добавлено стандартное свойство для совместимости */
        color: transparent;
        font-size: 25px; /* Размер текста */

        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Тень текста */
        -webkit-text-stroke: 1px #55000075; /* Обводка черным цветом */}

        
    .gradient-text3 {
        background: linear-gradient(90deg, #ffffff, #006f88);
        -webkit-background-clip: text;
        background-clip: text; /* Добавлено стандартное свойство для совместимости */
        color: transparent;
        font-size: 50px; /* Размер текста */
        font-weight: bold; /* Жирный шрифт */
        text-shadow: 5px 5px 9px rgba(0, 0, 0, 0.2); /* Тень текста */
        -webkit-text-stroke: linear-gradient(90deg, #00b7ff, #ffffff);
    }
    .container {
        display: grid;
        grid-template-columns: 1fr 1fr; /* Две колонки */
        gap: 20px; /* Расстояние между колонками */
    }

    .about,
    .features,
    .key-facts,
    .image-gallery,
    .fun-facts {
        background-color: #fff; /* Белый фон для секций */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тень */
    }

    .column-left {
        grid-column: 1; /* Колонка слева */
    }

    .column-right {
        grid-column: 2; /* Колонка справа */
    }

    .image-gallery img {
        width: 100%;
        max-width: 100%;
        border-radius: 5px; /* Закругленные углы для изображений */
    }

    .footer-container {
        max-width: 800px;
        margin: 0 auto;
    }

    footer {
        background-color: #003366; /* Темно-синий фон */
        color: #fff;
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
</style>

<body>
    <header>
        <div class="header-container">
            <h1 class="gradient-text3" >Welcome <?php echo $_SESSION['username']; ?> to ChatGPT</h1>
            
        </div>
    </header>

    <div class="container">
        <section class="about column-left">
            <h1 class="gradient-text">About ChatGPT</h2>
            <p>O ChatGPT é um modelo de linguagem poderoso que pode entender e gerar texto de maneira semelhante ao humano. Ele foi treinado em uma ampla variedade de dados da internet, tornando-o capaz de lidar com uma gama diversificada de tópicos e responder de maneira contextualmente relevante.</p>
        <p class="gradient-text2">Principais Características:</p>
        <ul>
            <li><strong style="color: #0080ff;">Conversação Avançada:</strong> O ChatGPT é capaz de participar em conversas de maneira natural, respondendo de forma coesa e contextual.</li>
            <li><strong style="color: #0080ff;">Compreensão de Linguagem Natural:</strong> Ele pode entender nuances e contextos em linguagem humana, proporcionando interações mais ricas.</li>
            <li><strong style="color: #0080ff;">Geração de Texto:</strong> O ChatGPT pode gerar conteúdo escrito em diversos estilos e propósitos, desde redações até criação de histórias.</li>
            <li><strong style="color: #0080ff;">Respostas Contextuais:</strong> Sua capacidade de levar em consideração o contexto da conversa permite respostas mais precisas e relevantes.</li>
        </ul>
        </section>
        <section class="image-gallery column-right">
            <div class="gallery-container">
                <img src="https://www.csee-etuce.org/images/AdobeStock_433722980_resized.jpg" alt="ChatGPT Image 1">
                </div>
        </section>
        <section class="key-facts column-left">
            <h2 class="gradient-text">Key Facts</h2>
            <ul>
                <li><strong style="color: #003366;">Treinamento Multifacetado:</strong> O ChatGPT é treinado em um grande volume de textos variados, desde artigos científicos até literatura contemporânea, o que lhe confere uma expertise ampla e única.</li>
                <li><strong style="color: #003366;">Amplo suporte linguístico:</strong> Este chatbot é capaz de interagir em vários idiomas, fornecendo suporte multilíngue a usuários de todo o mundo.</li>
                <li><strong style="color: #003366;">Possibilidades criativas:</strong> ChatGPT inspirou muitos projetos criativos, incluindo escrever poesia, criar música e até desenvolver videogames.</li>
                <li><strong style="color: #003366;">Potencial de pesquisa:</strong> Os pesquisadores usaram o ChatGPT para criar ferramentas adicionais no campo da inteligência artificial, testando suas capacidades em diversas tarefas científicas.</li>
                <li><strong style="color: #003366;">Especialista em imitação de gêneros:</strong> Graças à sua capacidade de adaptação ao estilo de diferentes gêneros, ChatGPT pode criar textos que imitam a estrutura e a linguagem de diversas formas literárias.</li>
                 </ul>
        </section>
        
        <section class="image-gallery column-right">
            <div class="gallery-container">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWnA1yAiYGJ18sstgxsQ4HSmM5mesQv6fbnw&usqp=CAU" alt="ChatGPT Image 3">
            </div>
        </section>
        <section class="features column-left">
            <h2 class="gradient-text">Key Features</h2>
            <ul>
                <li>Conversational AI</li>
                <li>Natural Language Understanding</li>
                <li>Text Generation</li>
                <li>Contextual Responses</li>
            </ul>
        </section>
        <section class="image-gallery column-right">
            <div class="gallery-container">
                <img src="https://mitm.institute/_next/image?url=https%3A%2F%2Fres.cloudinary.com%2Fdc3wrhtvh%2Fimage%2Fupload%2Fv1695975717%2Fiskusstvennyj_intellekt_fb3b483ebf.jpg&w=3840&q=50" alt="ChatGPT Image 2">
            </div>
        </section>

        <section class="fun-facts column-left">
            <h2 class="gradient-text"></h2>
            <ul>
                
            </ul>
        </section>

     
    </div>

    <footer>
        <div class="footer-container">
            <p>&copy; Yeva Trofimova meow meow meow</p>
        </div>
    </footer>
</body>

</html> 
