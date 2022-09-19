const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      const square = entry.target.querySelectorAll('.item');
      // console.log(square)
  
      if (entry.isIntersecting) {
        square.forEach(square => {
            square.classList.add('portfolio_animation');
        })
    
        return; // if we added the class, exit the function
      }
  
      // We're not intersecting, so remove the class!

      square.forEach(square => {
        square.classList.add('portfolio_animation');
    })
    square.forEach(square => {
      square.classList.remove('portfolio_animation');
    })
    });
  });
  
  observer.observe(document.querySelector('.portfolio-wrapper'));