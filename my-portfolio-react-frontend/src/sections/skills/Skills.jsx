// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react"
import { Autoplay } from "swiper";

// Import Swiper styles
import "swiper/css"
import "swiper/css/pagination"
import "swiper/css/autoplay"

// import required modules
import { Pagination } from "swiper"

import data from './data'
import './skills.css'
import Skill from '../../components/skill/Skill'

const Skills = () => {
  return (
    <section id="skills">
      <h2>Skills</h2>
      <p>
        These are the technical skills that I know, for non technical skills please check my resume
      </p>
      <div className="container">
        <Swiper
        slidesPerView={1}
        spaceBetween={30}
        breakpoints={{
            601: {slidesPerView: 2},
            1025: {slidesPerView: 3}
          }}
        pagination={{
          clickable: true,
        }} 
        modules={[Pagination, Autoplay]}
        autoplay={true} 
        className="mySwiper">
          {
            data.map(skill => (
              <SwiperSlide key={skill.id}>
                <Skill skill={skill}/>
              </SwiperSlide>
            ))
          }
        </Swiper>
      </div>
    </section>
  )
}

export default Skills