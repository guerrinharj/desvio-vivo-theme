const heroTag = document.querySelector('.hero')
const aboutTag = document.querySelector('.about')
const campanhaTitleTag = document.querySelector('.campanha-title')
const campanhaContainerTag = document.querySelector('.campanha-container')
const logoTag = document.querySelector('.logo')
const bodyTag = document.querySelector('body')
const aboutPostTag = document.querySelectorAll('.about-post')


if (bodyTag.classList.contains('archive')) {

  
    logoTag.style.pointerEvents = 'none'


    
} else {

    logoTag.style.pointerEvents = 'initial'

}


const addMovement = () => {
	const topViewport = window.pageYOffset 
	const midViewport = topViewport + (window.innerHeight / 2) 
  
 
	aboutPostTag.forEach((post, index) => { 
		const topSection = post.offsetTop 
		const midSection = topSection + (post.offsetHeight / 2)
    
    const distanceToSection = midViewport - midSection 
		
    
		const imageTag = post.querySelector('.post-image') 
		const textTag = post.querySelector('.post-text') 

		imageTag.style.transform = `rotate(${distanceToSection / 100}deg)` 
         textTag.style.bottom = `${distanceToSection / 2}px` 

		if (index % 2 == 0) { 
			textTag.style.transform = `rotate(-${distanceToSection / 100}deg)` 	
		} else {
			textTag.style.transform = `rotate(${distanceToSection / 100}deg)`
		}
		
  })

}

document.addEventListener('scroll', function(){
	addMovement()
})






const addToCartSingleProduct = document.querySelector('button.single_add_to_cart_button.button.alt')
const viewCartSingleProduct = document.querySelector('#added_to_cart_singleproduct')

addToCartSingleProduct.addEventListener('click', event => {
	event.preventDefault()
	viewCartSingleProduct.style.opacity = 1
})