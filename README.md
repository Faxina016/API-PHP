# 📍 Sistema de Busca de Endereço com Mapa Interativo

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" />
  <img src="https://img.shields.io/badge/Leaflet-199903?style=for-the-badge&logo=Leaflet&logoColor=white" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" />
</p>

> **Status do Projeto:** 🚀 Concluído / Em Expansão

## 📝 Descrição do Projeto
Este é um sistema de consulta de localização desenvolvido para facilitar a busca de endereços via **CEP** e permitir o ajuste fino através de um **Mapa Interativo**. 

O grande diferencial é a **Geocodificação Reversa**: se o ponto no mapa estiver um pouco longe da sua localização real (como a oficina do seu padrasto ou uma escola), você pode simplesmente **arrastar o marcador** e o sistema atualiza o endereço e o CEP automaticamente em tempo real.

---

## ✨ Funcionalidades Principais
*   🔍 **Busca por CEP:** Integração direta com a API ViaCEP.
*   🗺️ **Mapa Interativo:** Utiliza a biblioteca Leaflet para visualização dinâmica.
*   📍 **Marcador Arrastável:** Ajuste manual da posição exata no mapa.
*   🔄 **Geocodificação Reversa:** Busca o endereço exato (rua, bairro, cidade) ao soltar o marcador em um novo ponto (API Nominatim).
*   📱 **Design Responsivo:** Interface limpa, moderna e adaptável para qualquer monitor.

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Descrição |
| :--- | :--- |
| **PHP** | Lógica de back-end e requisições de API. |
| **JavaScript** | Manipulação do mapa e eventos de arraste. |
| **Leaflet.js** | Biblioteca open-source para mapas interativos. |
| **OpenStreetMap** | Base de dados geográfica. |
| **CSS3** | Estilização moderna com foco em UX (Flexbox). |

---

## 🚀 Como rodar o projeto
1. Tenha um servidor local instalado (Recomendado: **Laragon** ou XAMPP).
2. Clone este repositório:
   ```bash
   git clone [https://github.com/Faxina016/API-PHP.git](https://github.com/Faxina016/API-PHP.git)
