<!-- autor: Ordoñez Arreaga Ronny -->
<?php require_once "view/templates/navbar.php"; ?>

<main class="container" style="padding: 40px 20px;">

    <!-- Sección de bienvenida con imagen y nombre del usuario -->
    <section class="seccion-principal" style="background-color: #eaf4fc; padding: 40px 30px; border-radius: 10px; margin-bottom: 60px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); text-align: center;">
        <img src="assets/img/guarderia-icono.png" alt="Guardería" style="width: 80px; height: 80px; margin-bottom: 15px;">
        <h2 style="color: #007bff; margin-bottom: 15px;">
            ¡Bienvenido, <?= $_SESSION['usuario']['nombre'] ?? 'Usuario' ?>!
        </h2>
        <p style="font-size: 18px; max-width: 700px; margin: 0 auto;">
            Este sistema te permite gestionar eficientemente todos los aspectos relacionados con la guardería:
            registro de niños, personal, actividades, inventario y más.
        </p>
    </section>

    <!-- Sección: ¿Quiénes somos? -->
    <section style="margin-bottom: 60px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h3 style="color: #007bff;">¿Quiénes somos?</h3>
        <p style="text-align: justify; margin-top: 10px;">
            Somos una institución educativa dedicada al cuidado y desarrollo integral de los más pequeños.
            Nuestro compromiso es ofrecer un entorno seguro, afectivo y estimulante para el aprendizaje
            temprano, acompañado por un equipo humano altamente capacitado y comprometido.
        </p>
    </section>

    <!-- Sección: Misión -->
    <section style="margin-bottom: 60px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h3 style="color: #007bff;">Misión</h3>
        <p style="text-align: justify; margin-top: 10px;">
            Brindar un servicio de educación inicial de calidad, con enfoque en valores y estimulación temprana,
            que fomente el desarrollo físico, cognitivo, emocional y social de los niños, en estrecha
            colaboración con las familias.
        </p>
    </section>

    <!-- Sección: Visión -->
    <section style="margin-bottom: 60px; padding: 20px; border: 1px solid #ccc; border-radius: 8px;">
        <h3 style="color: #007bff;">Visión</h3>
        <p style="text-align: justify; margin-top: 10px;">
            Ser una guardería referente a nivel local por su excelencia educativa, innovación pedagógica
            y atención personalizada, formando una base sólida para el futuro académico y personal
            de nuestros estudiantes.
        </p>
    </section>

    <!-- Sección: Horarios -->
    <section style="margin-bottom: 40px; padding: 30px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9;">
        <h3 style="color: #007bff; margin-bottom: 15px;">Horarios de Atención</h3>
        <div style="display: flex; flex-direction: column; gap: 10px; font-size: 16px;">
            <div style="display: flex; justify-content: space-between;">
                <span><strong>Lunes a Viernes:</strong></span>
                <span>07:00 AM – 05:00 PM</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <span><strong>Sábados:</strong></span>
                <span>08:00 AM – 12:00 PM</span>
            </div>
            <div style="display: flex; justify-content: space-between; color: #d9534f;">
                <span><strong>Domingos y feriados:</strong></span>
                <span>Cerrado</span>
            </div>
        </div>
    </section>

</main>

<?php require_once "view/templates/footer.php"; ?>
