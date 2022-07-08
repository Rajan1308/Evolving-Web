import React from 'react';

import slide from './slide.twig';
import sliderData from './slide.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/Slider' };

export const SlideWithImage = () => (
  <div dangerouslySetInnerHTML={{ __html: slide(sliderData) }} />
);
