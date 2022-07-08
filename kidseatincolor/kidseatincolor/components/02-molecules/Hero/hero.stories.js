import React from 'react';

import hero from './hero.twig';

import heroData from './hero.yml';

import heroDatawithCard from './heroDatawithCard.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/HeroBanner' };

export const Hero = () => (
  <div dangerouslySetInnerHTML={{ __html: hero(heroData) }} />
);

export const HeroBannerWithCard = () => (
  <div
    dangerouslySetInnerHTML={{
      __html: hero({ ...heroData, ...heroDatawithCard }),
    }}
  />
);
