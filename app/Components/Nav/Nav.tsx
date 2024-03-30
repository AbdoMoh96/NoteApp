'use client'
import React from 'react';
import "@/app/Components/Nav/assets/style.scss";
import Image from "next/image";

interface propTypes {}

const Nav : React.FC<propTypes> = () => {


    return (
        <nav className='top_nav'>
            <span className='logo'>Note App</span>
            <div>
                   <div className='user_actions'>
                       <Image
                           src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80"
                           alt="user image"
                           width={400}
                           height={400}
                           priority={true}
                           quality={100}
                       />
                       <div className='action_menu'>
                           <button className='logout_button'>logout</button>
                       </div>
                   </div>
            </div>
        </nav>
    )
}

export default Nav;