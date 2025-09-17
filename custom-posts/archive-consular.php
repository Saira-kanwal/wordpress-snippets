<?php get_header(); ?>

<?php
$meta_query = array();
$tax_query = array();

if (!empty($_GET['speciality'])) {
	$tax_query[] = array(
		'taxonomy' => 'specialty',
		'field'    => 'slug',
		'terms'    => sanitize_text_field($_GET['speciality']),
	);
}

if (!empty($_GET['industry'])) {
	$tax_query[] = array(
		'taxonomy' => 'industry',
		'field'    => 'slug',
		'terms'    => sanitize_text_field($_GET['industry']),
	);
}

$args = array(
	'post_type' => 'consular',
	'posts_per_page' => -1,
	'post_status' => 'publish',
);

if (!empty($tax_query)) {
	$args['tax_query'] = $tax_query;
	$args['tax_query']['relation'] = 'AND';
}

$query = new WP_Query($args);
?>


<style>

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: linear-gradient(135deg, #222E50, #445A9C);
        overflow: hidden;
        color: #fff !important;
    }

    .hero-section h1 {
        font-family: "Poppins", geor;
        font-size: 2.5rem !important;
        z-index: 2;
        position: relative;
        color: #fff !important;
    }

    /* Floating elements */
    /*.floating-element {*/
    /*    position: absolute;*/
    /*    border-radius: 50%;*/
    /*    opacity: 0.25;*/
    /*    animation: float 12s infinite ease-in-out;*/
    /*}*/

    /*.circle1 {*/
    /*    width: 80px;*/
    /*    height: 80px;*/
    /*    background: #fff;*/
    /*    top: 20%;*/
    /*    left: 10%;*/
    /*    animation-delay: 0s;*/
    /*}*/

    /*.circle2 {*/
    /*    width: 120px;*/
    /*    height: 120px;*/
    /*    background: #FFD700;*/
    /*    top: 60%;*/
    /*    left: 70%;*/
    /*    animation-delay: 3s;*/
    /*}*/

    /*.circle3 {*/
    /*    width: 60px;*/
    /*    height: 60px;*/
    /*    background: #FF6F61;*/
    /*    top: 40%;*/
    /*    left: 50%;*/
    /*    animation-delay: 6s;*/
    /*}*/

    /*@keyframes float {*/
    /*    0% { transform: translateY(0) translateX(0); }*/
    /*    50% { transform: translateY(-30px) translateX(15px); }*/
    /*    100% { transform: translateY(0) translateX(0); }*/
    /*}*/

  
    .consular-archive-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Georgia', serif; /* Body font */
        font-size: 1rem !important; /* Body font size */
        line-height: 2;
        color: #222E50;
    }

    .consular-archive-title {
        text-align: center;
        font-family: "Poppins", geor; /* Heading font */
        font-size: 2.5rem !important;
        font-weight: 600;
        margin-bottom: 40px;
        color: #fff;
    }

	.consular-grid {
		display: grid;
		grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
		gap: 30px;
	}
	
	.consular-card {
		background: #fff;
		border-radius: 12px;
		box-shadow: 0 2px 6px rgba(0,0,0,0.06);
		overflow: hidden;
		transition: all 0.3s ease;
		position: relative;
		border: 1px solid transparent;
		text-decoration: none;
		color: inherit;
	}

	/* Hover state */
	.consular-card:hover {
		border: 1px solid #222E50;
		box-shadow: 0 6px 16px rgba(0,0,0,0.12);
		transform: translateY(-4px);
	}

	/* Bottom line effect */
	.consular-card::after {
		content: "";
		position: absolute;
		bottom: 0;
		left: 0;
		height: 3px;
		width: 0;
		background: #222E50;
		transition: width 0.3s ease;
		border-bottom-left-radius: 12px;
		border-bottom-right-radius: 12px;
	}

	.consular-card:hover::after {
		width: 100%;
	}

	.consular-card img {
		width: 120px;
		height: 120px;
		object-fit: cover;
		border-radius: 50%;
		margin: 20px auto 10px;
		display: block;
		border: 3px solid #eee;
	}

    .consular-description {
        font-size: 1rem !important; /* consistent body text */
        color: #222E50;
        line-height: 2 !important;
    }

	.consular-card-content {
		padding: 20px;
		text-align: center;
	}

    .consular-card-content h2 {
        font-family: 'Roboto', sans-serif; /* Heading font */
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 10px !important;
        color: #222E50;
    }

    .consular-card-content p {
        margin: 4px 0;
        font-family: 'Georgia', serif;
        color: #222E50;
        font-size: 16px;
    }
    
    .contact-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #426B69; 
    color: #FFFFFF !important;
    text-decoration: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.contact-btn:hover {
    background-color: #2F3B40; 
    color: #FFFFFF;
    transform: translateY(-2px); /* Lift effect */
    /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);*/
}


	.consular-card-content p strong {
		color: #222E50;
	}

    /* Responsive adjustments */
    @media (max-width: 768px) {
         .hero-section {
            height: 220px;
            padding: 0 20px;
        }
        .hero-section h1 {
            font-size: 2rem;
        }
        .consular-archive-title {
            font-size: 2rem !important;
        }
        .consular-card-content h2 {
            font-size: 1.1rem !important;
        }
        .consular-description {
            font-size: 0.9rem !important;
        }
    }

    @media (max-width: 480px) {
         .hero-section {
            height: 180px;
        }
        .hero-section h1 {
            font-size: 1.6rem;
        }
        .consular-archive-title {
            font-size: 1.7rem !important;
        }
        .consular-card img {
            width: 100px;
            height: 100px;
        }
    }

    /* Intro Section Styling */
    .consular-intro {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Georgia', serif;
        color: #222E50;
        line-height: 1.8;
    }

    .consular-intro h2 {
        font-family: "Roboto", sans-serif;
        font-size: 30px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
        color: #222E50;
    }

    .consular-intro h3 {
        font-family: "Roboto", sans-serif;
        font-size: 24px;
        font-weight: 600;
        margin: 30px 0 20px 0;
        color: #222E50;
    }

    .consular-intro p {
        margin-bottom: 20px;
        font-size: 16px;
        text-align: justify;
    }

	.consular-intro a {
		color: #426B69;
		text-decoration: underline;
		font-size: 16px;
	}

	.consular-intro a:hover {
		color: #2F3B40;
	}

     .specialisms-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 12px 30px; /* space between items */
    list-style: none;
    padding: 0;
    margin: 20px 0;
}

    .specialisms-list li {
        position: relative;
        padding-left: 25px; /* space for custom bullet */
        font-size: 1rem;
        color: #222E50;
        line-height: 1.6;
        transition: color 0.3s ease;
    }
    
    .specialisms-list li::before {
        content: "•"; /* custom bullet */
        position: absolute;
        left: 0;
        top: 0;
        color: #FF6B6B; /* default bullet color */
        font-weight: bold;
        font-size: 1.2rem;
        transition: transform 0.3s ease, color 0.3s ease;
    }
    
    .specialisms-list li:nth-child(2n)::before {
        color: #4ECDC4; /* alternate bullet color */
    }
    .specialisms-list li:nth-child(3n)::before {
        color: #FFD93D;
    }
    .specialisms-list li:nth-child(4n)::before {
        color: #1A73E8;
    }
    
    .specialisms-list li:hover {
        color: #0056b3;
    }
    
    .specialisms-list li:hover::before {
        transform: scale(1.4); /* animate bullet */
    }
    


	/* Filter Section Styling */
	.consular-filters {
		max-width: 1200px;
		margin: 40px auto;
		padding: 30px 20px;
		background: #f8f9fa;
		border-radius: 12px;
		box-shadow: 0 2px 10px rgba(0,0,0,0.1);
	}

	.consular-filters form {
		display: flex;
		gap: 20px;
		justify-content: center;
		flex-wrap: wrap;
		align-items: center;
	}

    .consular-filters select {
        padding: 12px 15px;
        border: 2px solid #ddd;
        border-radius: 8px;
        font-family: 'Georgia', serif;
        font-size: 1rem;
        background: white;
        color: #222E50;
        min-width: 200px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

	.consular-filters select:focus {
		outline: none;
		border-color: #222E50;
		box-shadow: 0 0 0 3px rgba(34, 46, 80, 0.1);
	}

	.consular-filters select:hover {
		border-color: #426B69;
	}

	/* Loading state */
	.loading {
		opacity: 0.6;
		pointer-events: none;
	}

    @media (max-width: 768px) {
        .consular-intro h2 {
            font-size: 24px;
        }
        
        .consular-intro h3 {
            font-size: 20px;
        }
        
        .specialisms-list {
            grid-template-columns: 1fr;
        }
        
        .consular-filters form {
            flex-direction: column;
            align-items: stretch;
        }
        
        .consular-filters select {
            min-width: auto;
            width: 100%;
        }
    }
</style>


<!-- Hero Section -->
<div class="hero-section">
	<h1>Our Consulars</h1>

	<!-- Floating circles -->
	<!--<div class="floating-element circle1"></div>-->
	<!--<div class="floating-element circle2"></div>-->
	<!--<div class="floating-element circle3"></div>-->
</div>







<div class="consular-intro">
	<h2>CHOOSE YOUR CONSULAR</h2>
	
	<?php
// Get the description from the dashboard option
$consulars_description = get_option('consulars_archive_description', '');

// Check if a description was set before displaying it
if (!empty($consulars_description)) :
?>
    <p>
        <?php echo wp_kses_post($consulars_description); ?>
    </p>
<?php endif; ?>
	    

    <h3>The specialisms</h3>
    <ul class="specialisms-list">
    <?php
    $specialities = get_terms(array(
        'taxonomy' => 'specialty',
        'hide_empty' => false,
    ));

    if (!is_wp_error($specialities) && !empty($specialities)) {
        foreach ($specialities as $speciality) {
            // If you want to show emoji/code before the name, you can add it in ACF term meta
            // Example: get_field('icon', 'specialty_' . $speciality->term_id);
            $icon = get_field('icon', 'specialty_' . $speciality->term_id); // optional ACF custom field for icon
            echo '<li>' . ($icon ? esc_html($icon) . ' ' : '') . esc_html($speciality->name) . '</li>';
        }
    }
    ?>
</ul>

</div>

<div class="consular-filters">
	<h3 style="text-align: center; margin-bottom: 25px; font-family: 'Roboto', sans-serif; color: #222E50; font-size: 24px; font-weight: 700; line-height: 25px;">Filter Consulars</h3>
	<form method="get" id="consular-filter-form">
		<!-- Specialities -->
		<div>
			<label for="speciality" style="display: block; margin-bottom: 5px; font-weight: 500; color: #222E50;">Speciality:</label>
			<select name="speciality" id="speciality" aria-label="Filter by speciality">
				<option value="">All Specialties</option>
				<?php
				$specialities = get_terms(array(
					'taxonomy' => 'specialty',
					'hide_empty' => false,
				));
				if (!is_wp_error($specialities) && !empty($specialities)) {
					foreach ($specialities as $speciality) {
						$selected = (isset($_GET['speciality']) && $_GET['speciality'] === $speciality->slug) ? 'selected' : '';
						echo '<option value="' . esc_attr($speciality->slug) . '" ' . $selected . '>' . esc_html($speciality->name) . '</option>';
					}
				}
				?>
			</select>
		</div>

		<!-- Industries -->
		<div>
			<label for="industry" style="display: block; margin-bottom: 5px; font-weight: 700; color: #222E50;">Industry:</label>
			<select name="industry" id="industry" aria-label="Filter by industry">
				<option value="">All Industries</option>
				<?php
				$industries = get_terms(array(
					'taxonomy' => 'industry',
					'hide_empty' => false,
				));
				if (!is_wp_error($industries) && !empty($industries)) {
					foreach ($industries as $industry) {
						$selected = (isset($_GET['industry']) && $_GET['industry'] === $industry->slug) ? 'selected' : '';
						echo '<option value="' . esc_attr($industry->slug) . '" ' . $selected . '>' . esc_html($industry->name) . '</option>';
					}
				}
				?>
			</select>
		</div>
	</form>
</div>





<div class="consular-archive-container">
	<div id="consular-results" class="consular-grid">
		<?php
		if ($query->have_posts()) :
			while ($query->have_posts()) : $query->the_post();
				$image_url = get_field('profile_picture');
				?>
				<div class="consular-card">
					<a href="<?php the_permalink(); ?>">
						<?php if ($image_url): ?>
							<img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>">
						<?php else: ?>
							<img src="https://via.placeholder.com/400x250?text=No+Image" alt="No Image">
						<?php endif; ?>
					</a>
					<a href="<?php the_permalink(); ?>">
						<div class="consular-card-content">
							<h2><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h2>
							<p class="consular-description"><?php the_field('short_description'); ?></p>
							<a class="contact-btn" href="/contact" target="_blank">Contact <?php the_field('first_name'); ?></a>
						</div>
					</a>
				</div>
			<?php endwhile;
			wp_reset_postdata();
		else : ?>
			<p>No consular profiles found.</p>
		<?php endif; ?>
	</div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
	const form = document.getElementById("consular-filter-form");
	const resultsContainer = document.getElementById("consular-results");

	function updateResults() {
		const formData = new FormData(form);
		const speciality = formData.get("speciality") || "";
		const industry = formData.get("industry") || "";

		resultsContainer.classList.add('loading');
		resultsContainer.innerHTML = '<div style="text-align: center; padding: 40px; font-size: 16px; line-height: 25px; color: #222E50; grid-column: 1 / -1;">Loading consulars...</div>';

		const url = new URL(window.location);
		speciality ? url.searchParams.set('speciality', speciality) : url.searchParams.delete('speciality');
		industry ? url.searchParams.set('industry', industry) : url.searchParams.delete('industry');

		fetch(url.toString(), {
			method: 'GET',
			headers: { 'X-Requested-With': 'XMLHttpRequest' }
		})
		.then(resp => resp.text())
		.then(html => {
			const parser = new DOMParser();
			const doc = parser.parseFromString(html, 'text/html');
			const newResults = doc.getElementById('consular-results');
			if (newResults) {
				resultsContainer.innerHTML = newResults.innerHTML;
			}
			resultsContainer.classList.remove('loading');
			window.history.pushState({}, '', url);
		})
		.catch(() => {
			resultsContainer.classList.remove('loading');
			resultsContainer.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #e74c3c; font-size: 16px; line-height: 25px;">Sorry, there was a problem loading the results. Please try again.</div>';
		});
	}

	form.addEventListener('change', updateResults);
});
</script>


<?php
// REMOVED ALL AJAX CODE - Using page fetch method instead
// This eliminates all WordPress AJAX issues completely
?>

<?php get_footer(); ?>