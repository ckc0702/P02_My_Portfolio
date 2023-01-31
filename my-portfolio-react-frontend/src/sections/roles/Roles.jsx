import './roles.css'
import data from './data'
import Card from '../../components/card/Card'

const Roles = () => {
  return (
    <section id="roles">
      <h2>My IT Roles</h2>
      <p>I give you the best in all the services below</p>
      <div className="container roles__container" data-aos="fade-up">
          {
            data.map(item => (
              <Card key={item.id} className='role light'>
                <div className="role__icon">{item.icon}</div>
                <div className="role__details">
                  <h4>{item.title}</h4>
                  <p>{item.desc}</p>
                </div>
              </Card>
            ))
          }
      </div>
    </section>
  )
}

export default Roles