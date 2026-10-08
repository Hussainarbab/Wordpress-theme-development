<?php

get_header();

?>

<main class="contact-page">

    <section class="contact-section">

        <div class="contact-container">

            <div class="contact-intro">

                <p class="section-tag">Contact Us</p>

                <h1>Let's Work Together</h1>

                <p>
                    Have a project in mind? Send us a message and
                    we will get back to you as soon as possible.
                </p>

            </div>


            <?php if ( isset( $_GET['contact'] ) && $_GET['contact'] === 'success' ) : ?>

                <div class="form-success">
                    Your message has been sent successfully!
                </div>

            <?php endif; ?>


            <div class="contact-form-wrapper">

                <form
                    class="contact-form"
                    method="POST"
                    action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"
                >

                    <input type="hidden" name="action" value="contact_form">

                    <?php wp_nonce_field( 'contact_form_action', 'contact_form_nonce' ); ?>


                    <div class="form-group">

                        <label for="name">Your Name</label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Enter your name"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="email">Your Email</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label for="message">Your Message</label>

                        <textarea
                            id="message"
                            name="message"
                            rows="6"
                            placeholder="Write your message..."
                            required
                        ></textarea>

                    </div>


                    <button type="submit">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </section>

</main>

<?php get_footer(); ?>