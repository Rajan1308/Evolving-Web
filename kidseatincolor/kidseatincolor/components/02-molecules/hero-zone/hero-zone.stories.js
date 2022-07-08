import React from 'react';

import headerZone from './hero-zone.twig';

import headerZoneData from './hero-zone.yml';
import headerZoneWithoutImageData from './hero-zone-without-image.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Hero zone' };

export const HeroZone = () => (
  <div dangerouslySetInnerHTML={{ __html: headerZone(headerZoneData) }} />
);

export const HeroZoneWithoutImage = () => (
  <div
    dangerouslySetInnerHTML={{ __html: headerZone(headerZoneWithoutImageData) }}
  />
);
