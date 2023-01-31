import './header.css'
import HeaderImage from '../../assets/header.jpg'
import data from './data'
import { useEffect } from 'react'
import AOS from 'aos'
import 'aos/dist/aos.css'

const Header = () => {
  useEffect(() => {
    AOS.init({duration: 2000})
  })
  return (
    <header id="header">
      <div className="container header__container">
        <div className="header__profile" data-aos="flip-up">
          <img src={HeaderImage} alt="Header Portrait" />
        </div>
        <h3 data-aos="fade-in">Kelvin</h3>
        <p data-aos="fade-in">
          Dummy text
        </p>
        <div className="header__cta">
          <a href="#contact" className='btn primary' data-aos="fade-in">Contact Me</a>
          <a href="#portfolio" className='btn light' data-aos="fade-in">My Work</a>
        </div>
        <div className="header__socials">
          {
            data.map(item => <a key={item.id} href={item.link} target="_blank" rel="noopener noreferrer">
              {item.icon}</a>)
          }
        </div>
      </div>
    </header>
  )
}

export default Header