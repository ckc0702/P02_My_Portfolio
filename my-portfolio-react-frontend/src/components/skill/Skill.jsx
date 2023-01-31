import Card from "../card/Card"

import './skill.css'

const Skill = (props) => {
  return (
    <Card className="light">
        <p>{props.skill.quote}</p>
        <div className="skill__brand">
            <div className="skill__brand-img">
                <img src={props.skill.avatar} alt="Skill Brand" />
            </div>
            <div className="skill__brand-details">
                <h6>{props.skill.name}</h6>
                <small>{props.skill.profession}</small>
            </div>
        </div>
    </Card>
  )
}

export default Skill